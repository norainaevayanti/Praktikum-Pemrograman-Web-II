<?php namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;
use App\Models\PostModel;

class Buku extends Controller
{
    /**
     *
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model = new BukuModel();
        $this->helpers = ['form', 'url'];

    }

    public function login()
    {
        $data = [
            'posts' => $this->model->paginate(10),
            'pager' => $this->model->pager,
            'title' => 'POST LIST'
        ];

        return view('vw_login', $data);
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        $data = [
            'posts' => $this->model->paginate(10),
            'pager' => $this->model->pager,
            'title' => 'POST LIST'
        ];

        return view('vw_buku', $data);
    }

    public function create()
    {
        // Check if user is authenticated
    if (!session()->get('logged_in')) {
        return redirect()->to(base_url('/login'));
    }
        $data = ['title' => 'Create new post'];

        return view('vw_add', $data);
    }

    public function store()
    {
        $data = $this->request->getPost(['judul', 'penulis', 'penerbit', 'tahun_terbit']);

        if (! $this->validateData($data, $this->model->validationRules)) {
            return $this->create();
        }

        $post = $this->validator->getValidated();

        $save = $this->model->save([
            'judul' => $post['judul'],
            'penulis' => $post['penulis'],
            'penerbit' => $post['penerbit'],
            'tahun_terbit' => $post['tahun_terbit'],
        ]);

        session()->setFlashdata('success', 'Post has been added successfully.');
        return redirect()->to(base_url('home'));
  }

  public function edit($id)
  {
    // Check if user is authenticated
    if (!session()->get('logged_in')) {
        return redirect()->to(base_url('/login'));
    }
      $post = $this->model->find($id);
      if (empty($post)) {
          session()->setFlashdata('error','Post not found');
          return redirect()->back();
      }
      $data = [
          'title' => 'Edit Post',
          'post' => $post
      ];

      return view('vw_edit', $data);
  }

  public function update($id)
  {
    // Check if user is authenticated
    if (!session()->get('logged_in')) {
        return redirect()->to(base_url('/login'));
    }
      $post = $this->model->find($id);

      if (empty($post)) {
          session()->setFlashdata('error','Post not found');
          return redirect()->back();
      }

      $data = $this->request->getPost(['judul', 'penulis', 'penerbit', 'tahun_terbit']);

      if (! $this->validateData($data, $this->model->validationRules)) {
          return $this->create();
      }

      $updatedPost = $this->validator->getValidated();

      $update = $this->model->update($post['id'], $updatedPost);

      if ($update) {
          session()->setFlashdata('success', 'Post has been updated successfully');
          return redirect()->to(base_url('home'));
      } else {
          session()->setFlashdata('error', 'Some problems occured, please try again.');
          return redirect()->back();
      }
  }

  public function delete($id)
  {
    // Check if user is authenticated
    if (!session()->get('logged_in')) {
        return redirect()->to(base_url('home'));
    }

      if (empty($id)) {
          return redirect()->to(base_url('home'));
      }

      $delete = $this->model->delete($id);

      if ($delete) {
          session()->setFlashdata('success', 'Post has been removed successfully.');
          return redirect()->to(base_url('home'));
      } else {
          session()->setFlashdata('error', 'Some problems occured, please try again.');
          return redirect()->to(base_url('home'));
      }

  }


}
