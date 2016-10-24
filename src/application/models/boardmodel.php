class Boardmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        $data = array(
            'name' => $this->input->post('name'),
            'email'=> $this->input->post('email'),
            'comment' => $this->input->post('comment')
        );

        echo var_dump($data);
    }
}