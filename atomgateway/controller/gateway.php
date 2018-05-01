public function busGatwaye()
        {
        	$customerName = $_SESSION['customerName'];
        	$customerEmail = $_SESSION['customerEmail'];
        	$CustomerAddress = $_SESSION['CustomerAddress'];
        	$amount = $_SESSION['amount'];

        		date_default_timezone_set('Asia/Calcutta');
				$datenow = date("d/m/Y h:m:s");
				$transactionDate = str_replace(" ", "%20", $datenow);

				$transactionId = rand(1000000,9999999);
				

				$this->load->library('TransactionRequest');

				$transactionRequest = new TransactionRequest();
				

				//Setting all values here
				$transactionRequest->setMode("Production");
				$transactionRequest->setLogin(57938);
				$transactionRequest->setPassword("GMNP@123");
				$transactionRequest->setProductId("GMNP_RECHARGE");
				$transactionRequest->setAmount($amount);
				$transactionRequest->setTransactionCurrency("INR");
				$transactionRequest->setTransactionAmount($amount);
				$transactionRequest->setReturnUrl(base_url('GetStation/response'));
				$transactionRequest->setClientCode($user_id);
				$transactionRequest->setTransactionId($transactionId);
				$transactionRequest->setTransactionDate($transactionDate);
				$transactionRequest->setCustomerName($customerName);
				$transactionRequest->setCustomerEmailId($customerEmail);
				//$transactionRequest->setCustomerMobile($number);
				$transactionRequest->setCustomerBillingAddress($CustomerAddress);
				$transactionRequest->setCustomerAccount("639827");
				$transactionRequest->setReqHashKey("dffb98122da3cc8670");


				$url = $transactionRequest->getPGUrl();

				// echo $url;die;

				header("Location: $url");
        }