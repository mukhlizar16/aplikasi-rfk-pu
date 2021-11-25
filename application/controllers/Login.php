<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('auth/login-page');
	}

	public function process()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('status', '<div class="alert alert-danger"><span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span> <strong>Maaf !</strong> Cek kembali data anda</div>');
			$this->index();
		} else {
			$email = htmlspecialchars($_POST['email'], true);
			$password = htmlspecialchars($_POST['password'], true);

			$cek = $this->Login_model->cek_user($email);
			if ($cek->num_rows() > 0) {
				$result = $cek->row_array();
				$pass = $result['password'];
				if (password_verify($password, $pass)) {
					$sess_data = [
						'id' => $result['id'],
						'nama' => $result['nama'],
						'email' => $result['email'],
						'log-in' => 1
					];

					$this->session->set_userdata($sess_data);
					$this->session->set_flashdata('status', '<div class="alert alert-success"><span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span> <strong>Selamat !</strong> Anda berhasil login</div>');
					$this->index();
					echo "
						<script>
						setTimeout(function (){
    							window.location.assign(url + 'home')
							}, 2000)
						</script>";
				} else {
					$this->session->set_flashdata('status', '<div class="alert alert-warning"><span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span> <strong>Maaf !</strong> Password salah</div>');
					$this->index();
				}
			} else {
				$this->session->set_flashdata('status', '<div class="alert alert-danger"><span class="closebtn" onclick="this.parentElement.style.display=\'none\'">&times;</span> <strong>Maaf !</strong> Email tidak terdaftar</div>');
				$this->index();
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
