<?php

class Mahasiswa  extends Controller{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('mahasiswa_model')->tambahDataMahasiswa($_post) > 0){
            Flasher::setFlash('berhasil'. 'ditambahkan'. 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else{
        Flasher::setFlash('gagal'. 'ditambahkan'. 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('mahasiswa_model')->hapusDataMahasiswa($id) > 0){
            Flasher::setFlash('berhasil'. 'dihapus'. 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else{
        Flasher::setFlash('gagal'. 'dihapus'. 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

        public function getUbah()
        {
           echo json_decode( $this->model('Mahasiswa_model')->getaMahasiswaById($_POST['id']));
        }

        public function ubah()
        {
            if( $this->model('mahasiswa_model')->ubahDataMahasiswa($_post) > 0){
                Flasher::setFlash('berhasil'. 'diubah'. 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }else{
            Flasher::setFlash('gagal'. 'diubah'. 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function Cari()
        {
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }

}