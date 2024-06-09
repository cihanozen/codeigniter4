<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SliderModel;

class SliderController extends BaseController
{
    private $sliderModel;
    private $userModel;

    public function __construct()
    {
        $this->sliderModel = new \App\Models\SliderModel();
        $this->userModel = new \App\Models\UsersModel();
    }

    public function index()
    {
       
        $uri = service('uri');
        $locale = $this->request->getLocale();
        $sliderModel = new SliderModel();
    
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'uri' => $uri,
            'sliders' => $sliderModel->findAll()

        ];

        return view('Panel/Slider/SliderLists_v',$data);
    }

    public function create()
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $this->userModel->find($loggedUserId);

        $data = [
            'username' => @$userInfo['username'],
            'email' => @$userInfo['email'],
            'locale' => $locale,
            'uri' => $uri,
        ];

        return view('Panel/Slider/SliderAdd_v',$data);
    }

    public function save()
    {

        $uri = service('uri');
        $locale = $this->request->getLocale();

        $sliderModel = new SliderModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'image' => [
                'label' => 'Image',
                'rules' => 'uploaded[image]|is_image[image]|max_size[image,2048]|ext_in[image,jpg,jpeg,png]',
                'errors' => [
                    'uploaded' => 'Lütfen bir fotoğraf yükleyin.',
                    'is_image' => 'Resim geçerli, yüklenmiş bir resim dosyası değil.',
                    'max_size' => 'Maksimum dosya sınırını geçtiniz.'
                ]
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){

            return redirect()->to($locale .'/slider-create')->with('errors', $validation->getErrors());

        }

        $file = $this->request->getFile('image');

        if($file->isValid() && !$file->hasMoved()){
            $newFileName = $file->getRandomName();

            $sliderDir = FCPATH . 'images/slider';
            $thumbDir = FCPATH . 'images/slider/thumbs';

            $file->move($sliderDir, $newFileName);
            $imagePath = 'images/slider/' . $newFileName;

            if(!is_dir($sliderDir)){
                mkdir($sliderDir, 0777, true);
            }

            if(!is_dir($thumbDir)){
                mkdir($thumbDir, 0777, true);
            }

            if(!is_writeable($sliderDir) || !is_writeable($thumbDir)){
                return redirect()->back()->with('errors', ['image' => 'Yazma izinleri yok']);
            }

            // Thumb
            $image = \Config\Services::image()
            ->withFile($sliderDir . '/' . $newFileName)
            ->resize(150,150, true, 'height')
            ->save($thumbDir . '/' . $newFileName);

            // Orginal
            $image = \Config\Services::image()
            ->withFile($sliderDir . '/' . $newFileName)
            ->resize(800,600, true, 'height')
            ->save($sliderDir . '/' . $newFileName);

            $data = [
                'image_path' => $imagePath,
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
            ];

            $sliderModel->save($data);

            return redirect()->to($locale .'/slider-lists')->with('success','Slider yüklemesi başarılı!');

        }

        return redirect()->back()->with('errors', ['image' => 'Slider yüklemesi yapılamadı!']);

    }

    public function delete($id)
    {   

        // Sunucudan resmin bulunduğu klasörden siliyoruz.
        $slider = $this->sliderModel->find($id);

        if($slider){

            // Veritabanından silmek istediğimiz id yi kaldırdık.
            $this->sliderModel->deleteSlider($id);

            // Sunucudan resmi siliyoruz.
            $imagePath = FCPATH . 'images/slider/'. basename($slider['image_path']);
            $imagePathThumbs = FCPATH . 'images/slider/thumbs/'. basename($slider['image_path']);

            if(file_exists($imagePath) || file_exists($imagePathThumbs)){
                unlink($imagePath);
                unlink($imagePathThumbs);
            }

            return redirect()->to(base_url($this->viewData['locale'].'/slider-lists'))->with('successDelete', Lang('Text.SuccessDelete'));

        }

    }

}

?>