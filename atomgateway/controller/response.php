 public function response()
    {
        //require_once (base_url().'TransactionResponse.php');  
        $this->load->library('TransactionResponse');      
        $transactionResponse = new TransactionResponse();
        //print_r($transactionResponse);die;
        $transactionResponse->setRespHashKey("0203c4c086322903be");
        	 //echo "<pre>";
            	// print_r($_POST);die;


        if($transactionResponse->validateResponse($_POST)){
            $this->rechargemodel->addBusgatwayedata($_POST);
           // $this->rechargemodel->storewalletdata($_POST);



            // print_r($_SESSION['mainamount'] );
            // print_r($_SESSION['amount'] );die;

            if ($_POST['mmp_txn'] != 0 ) {

            	//echo "<pre>";
            	//print_r($this->session->userdata());die;
                

                

                echo "Transaction Processed <br/>";

                

                redirect(base_url('GetStation/seatBook'));
            }else
            {

                $this->load->view('GetStation');
            }