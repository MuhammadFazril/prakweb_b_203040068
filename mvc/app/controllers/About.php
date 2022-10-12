<?php 

class About extends Controller{
  public function index($nama = 'Fazril', $pekerjaan = 'Mahasiswa', $umur = 20)
  {
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['umur'] = $umur;
    $data['jdudul'] = 'About Me';
    $this->view('about/header', $data);
    $this->view('about/index', $data);
    $this->view('about/footer');
  }

  public function page()
  {
    $data['judul'] = 'Pages';
    $this->view('templates/header');
    $this->view('about/page');
    $this->view('templates/footer');
  }
}