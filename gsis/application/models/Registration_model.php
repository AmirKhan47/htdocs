<?php
	class Registration_model extends CI_Model
	{
		function __construct()
		{
			$this->load->database();
		}
		public function get_all_branches_in_class($class_id)
		{
			$this->db->select('b.*');
		    $this->db->from('branch b');
		    $this->db->join('class_branch cb','cb.branch_id=b.id','inner');
		    $this->db->join('classes c','c.id=cb.class_id','inner');
		    $this->db->where('c.id',$class_id); 
		    //$this->db->limit($limit, $start);
		    $query = $this->db->get();
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function get_all_classes_in_branch($branch_id)
		{
			$this->db->select('c.*');
		    $this->db->from('branch b');
		    $this->db->join('class_branch cb','cb.branch_id=b.id','inner');
		    $this->db->join('classes c','c.id=cb.class_id','inner');
		    $this->db->where('b.id',$branch_id); 
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}

		public function get_all_subject_in_classes($class_id)
		{
			$this->db->select('s.subject_name,s.subject_group,s.id,s.subject_type');
		    $this->db->from('subject s');
		    $this->db->join('class_subjects cs','cs.subject_id=s.id','inner');
		    $this->db->join('classes c','c.id=cs.class_id','inner');
		    // $where=array(
		    // 	'cs.class_id' =>$class_id,
		    // 	's.student_id' => $student_id, 
		    // );
		    $this->db->where('cs.class_id',$class_id);
		    $this->db->order_by('s.subject_group', 'desc');
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}

		public function get_registered_subjects($student_id)
		{
			$this->db->select('sub.subject_name,sub.subject_group,sub.subject_type,ss.id');
		    $this->db->from('subject sub');
		    $this->db->join('student_subject ss','ss.subject_id=sub.id','inner');
		    $this->db->join('student s','s.id=ss.student_id','inner');
		    $this->db->where('s.id',$student_id); 
		    $this->db->order_by('sub.subject_group', 'desc');
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}

		public function register_new_student($student,$registration,$guardian,$guardian1,$contact,$address,$student_contact)
		{
			$errNo="";
			$errMess="";
			//print_r($student);
			$db_debug = $this->db->db_debug; //save setting
			$this->db->db_debug = FALSE; //disable debugging for queries
			$dbRet = $this->db->insert('student', $student);
			/*if(!$dbRet)
			{
	       		print_r( $this->db->error()); // Has keys 'code' and 'message'
			}
			$this->db->db_debug = $db_debug; //restore setting
			*/
			if(!$dbRet)
			{
				/*$errNo   = $this->db->_error_number();
	   			$errMess = $this->db->_error_message();*/
	   			print_r( $this->db->error());
			}
			else
			{
				$student_id = array('student_id' => $this->db->insert_id());
				$this->update_data_in_table('student',array('student_roll_no'=>$student_id['student_id']),array('id'=>$student_id['student_id']));

				/*echo "<pre>";
				print_r ($guardian);
				echo "</pre>";
				echo "<pre>";
				print_r ($guardian1);
				echo "</pre>";*/

			    $dbRet = $this->db->insert('guardian', $guardian);
			    $father_id['father_id'] = $this->db->insert_id();
			    // echo "<pre>";
			    // print_r ($father_id);
			    // echo "</pre>";
			    if($dbRet)
			    {
			    $dbRet1 = $this->db->insert('guardian', $guardian1);
			    $mother_id['mother_id'] = $this->db->insert_id();
			    // echo "<pre>";
			    // print_r ($mother_id);
			    // echo "</pre>";
				}
			    // $dbRet = $this->db->insert_batch('guardian', $guardian);
			    
			    if(!$dbRet1)
			    {
			    	//$this->db->delete_where('student',array('id' => $student_id['student_id'] ));
			    	print_r( $this->db->error());
			    }
			    else
			    {
			    	// $guardian_id = array('guardian_id' => $this->db->insert_id());
			    	// echo "<pre>";
			    	// print_r ($guardian_id);
			    	// echo "</pre>";
			    	

			    	$student_guardian = array(	'student_id'					=>	$student_id['student_id'],
			    								'guardian_id'					=>	$father_id['father_id'],
			    								'student_guardian_relationship'	=>	'Father'
			    							);
			    	// echo "<pre>";
			    	// print_r ($student_guardian);
			    	// echo "</pre>";
			    	$dbRet = $this->db->insert('student_guardian', $student_guardian);

			    	$student_guardian1 = array(	'student_id'					=>	$student_id['student_id'],
			    								'guardian_id'					=>	$mother_id['mother_id'],
			    								'student_guardian_relationship'	=>	'Mother'
			    							);
			    	// echo "<pre>";
			    	// print_r ($student_guardian1);
			    	// echo "</pre>";
			    	$dbRet1 = $this->db->insert('student_guardian', $student_guardian1);

			    	if(!$dbRet1)
			    	{
			    		echo "student_guardian fail to insert";
			    		$this->db->delete_where('student',array('id' => $student_id['student_id'] ));
			    		print_r( $this->db->error());
			    	}
			    	else
			    	{
			    		$registration=array_merge($registration, $student_id);
			    		// echo "<pre>";
			    		// print_r ($registration);
			    		// echo "</pre>";
			    		$dbRet = $this->db->insert('registration', $registration);
			    		if(!$dbRet)
			    		{
			    			// echo $this->db->last_query();
			    			echo "registration fail to insert";
			    			// echo "<pre>";
			    			// print_r ($father_id);
			    			// echo "</pre>";
			    			$this->db->delete('guardian',array('id' => $father_id['father_id'] ));
			    			$this->db->delete('guardian',array('id' => $mother_id['mother_id'] ));
			    			$this->db->delete('student',array('id' => $student_id['student_id'] ));
			    			print_r( $this->db->error());
			    			$uppercase_all_names = $this->db->query("UPDATE student SET `student_name` = UPPER(`student_name`)");
			    		}
			    		else
			    		{
			    			$registration_id = array('registration_id' => $this->db->insert_id());

			    			$dbRet = $this->db->insert('contact', $contact);
			    			if(!$dbRet)
			    			{
			    				$this->db->delete_where('registration',array('id' => $registration_id['registration_id'] ));
								$this->db->delete('guardian',array('id' => $father_id['father_id'] ));
			    				$this->db->delete('guardian',array('id' => $mother_id['mother_id'] ));
			    				$this->db->delete('student',array('id' => $student_id['student_id'] ));
								print_r( $this->db->error());
			    			}
			    			else
			    			{
			    				$contact_id = array('contact_id' => $this->db->insert_id());

							    $address=array_merge($address, $contact_id);
							    $this->db->insert('address', $address);
							    if(!$dbRet)
							    {
							    	$this->db->delete_where('contact',array('id' => $contact_id['contact_id'] ));
							    	$this->db->delete_where('registration',array('id' => $registration_id['registration_id'] ));
									$this->db->delete('guardian',array('id' => $father_id['father_id'] ));
			    					$this->db->delete('guardian',array('id' => $mother_id['mother_id'] ));
				    				$this->db->delete_where('student',array('id' => $student_id['student_id'] ));
							    	print_r( $this->db->error());
							    }
							    else
							    {	
							    	$address_id = array('address_id' => $this->db->insert_id());

							    	$student_contact=array_merge($student_contact, $student_id);
								    $student_contact=array_merge($student_contact, $contact_id);
								    $dbRet = $this->db->insert('student_contact', $student_contact);
								    if(!$dbRet)
								    {
								    	$this->db->delete_where('address',array('id' => $address_id['address_id'] ));
								    	$this->db->delete_where('contact',array('id' => $contact_id['contact_id'] ));
								    	$this->db->delete_where('registration',array('id' => $registration_id['registration_id'] ));
										$this->db->delete('guardian',array('id' => $father_id['father_id'] ));
			    						$this->db->delete('guardian',array('id' => $mother_id['mother_id'] ));
					    				$this->db->delete_where('student',array('id' => $student_id['student_id'] ));
								    	print_r( $this->db->error());
								    }
								    else
								    {
								    	$errMess="success";
								    }
							    }
			    			}
			    		$uppercase_all_students_name = $this->db->query("UPDATE student SET `student_name` = UPPER(`student_name`)");
			    		}
			    	}	
			    }
			}
			$this->db->db_debug = $db_debug; //restore setting
		    return $errMess;
		
		}

		public function is_student_national_id_registered($student_national_id)
		{
			$query = $this->db->get_where('student', array('student_national_id'=>$student_national_id));
			//var_dump($query->row_array());
			$rowcount = $query->num_rows();
			return $rowcount>0?true:false;
		}
		public function is_table_has_column($table_name,$column_array)
		{
			$query = $this->db->get_where($table_name, $column_array);
			//var_dump($query->row_array());
			$rowcount = $query->num_rows();
			return $rowcount>0?true:false;
		}

		public function get_student($student_id)
		{
			$this->db->select('*');
		    $this->db->from('student s');
		    $this->db->join('registration r', 'r.student_id=s.id', 'left');
		    $this->db->join('classes cl','r.class_id=cl.id','left');
		    $this->db->join('student_contact sc', 'sc.student_id=s.id', 'left');
		    $this->db->join('contact c', 'c.id=sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id=c.id', 'left');
		    $this->db->where('s.id',$student_id);
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->row_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function get_branch_contact($branch_id)
		{
			$this->db->select('*');
		    $this->db->from('contact c');
		    $this->db->join('branch_contact bc', 'bc.contact_id=c.id', 'inner');
		    $this->db->join('address a','a.contact_id=c.id','left');
		    $this->db->where('bc.branch_id',$branch_id);
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->row_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function get_student_guardian_single($student_id,$relationhip_to_child="")
		{
			$this->db->select('*');
		    $this->db->from('student s'); 
		    $this->db->join('student_guardian sg', 'sg.student_id=s.id', 'left');
		    $this->db->join('guardian g', 'g.id=sg.guardian_id', 'inner');
		    $this->db->where('s.id',$student_id);
		    if($relationhip_to_child!=""){
		    	$this->db->where('sg.student_guardian_relationship',$relationhip_to_child);
		    }
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->row_array();
		    }
		    else
		    {
		        return false;
		    }
		}

		public function get_all_guardians($student_id)
		{
			$this->db->select('g.*,sg.*,c.*');
		    $this->db->from('student s'); 
		    $this->db->join('student_guardian sg', 'sg.student_id=s.id', 'left');
		    $this->db->join('guardian g', 'g.id=sg.guardian_id', 'inner');
		    $this->db->join('guardian_contacts gc', 'gc.guardian_id=sg.guardian_id', 'left');
		    $this->db->join('contact c', 'c.id=gc.contact_id', 'left');
		    $this->db->where('s.id',$student_id);
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function user_count11($status='')
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s'); 
		    $this->db->join('email e', 's.id=e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id=s.id', 'left');
		    $this->db->join('classes cl','r.class_id=cl.id','left');
		    $this->db->join('student_contact sc', 'sc.student_id=s.id', 'left');
		    $this->db->join('contact c', 'c.id=sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id=c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status!='')
		    {
		    	$this->db->where('r.registration_status',$status);
		    	$this->db->where('s.student_status', 1);
		    }
		    $this->db->group_by('s.id');
			$this->db->order_by('r.registration_date', 'desc');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function user_count($status='',$branch_id)
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s'); 
		    $this->db->join('email e', 's.id=e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id=s.id', 'left');
		    $this->db->join('classes cl','r.class_id=cl.id','left');
		    $this->db->join('student_contact sc', 'sc.student_id=s.id', 'left');
		    $this->db->join('contact c', 'c.id=sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id=c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status!='')
		    {
		    	$this->db->where('r.registration_status',$status);
		    	$this->db->where('s.student_status', 1);
		    	$this->db->where('r.branch_id',$branch_id);
		    }
		    $this->db->group_by('s.id');
			$this->db->order_by('r.registration_date', 'desc');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function get_data1($status,$id=0)
		{
			$column_order = array('s.student_roll_no','s.student_name','r.pending_date','c.contact_cell','b.branch_name','s.student_national_id'); //set column field database for datatable orderable
			$column_search = array('s.student_roll_no','s.student_name','r.pending_date','c.contact_cell','b.branch_name','s.student_national_id'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl','r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status!='')
		    {
		    	$where=array(
		    		'r.registration_status' => $status,
		    		's.student_status' => 1,
		    	);
		    	$this->db->where($where);
		    }
		    $this->db->group_by('s.id');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}
		public function get_data($status,$branch_id,$id = 0)
		{
			$column_order = array('s.student_roll_no','s.student_name','r.pending_date','c.contact_cell','b.branch_name','s.student_national_id'); //set column field database for datatable orderable
			$column_search = array('s.student_roll_no','s.student_name','r.pending_date','c.contact_cell','b.branch_name','s.student_national_id'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order

			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl','r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status!='')
		    {
		    	$where=array(
		    		'r.registration_status' => $status,
		    		's.student_status' => 1,
		    		'r.branch_id' => $branch_id
		    	);
		    	$this->db->where($where);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}

		public function user_count22($status = '',$status1 = '')
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id','left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status!='')
		    {
		    	// $where = array('r.registration_status' => $status);
		    	// $where1 = array('r.registration_status' => $status1);
		    	// $this->db->where($where);
		    	// $this->db->or_where($where1);
		  	  	// $where = "r.registration_status='registered' OR r.registration_status='payment pending'";
				// $this->db->where($where);
		  	  	// $where = "r.registration_status='registered' OR r.registration_status='payment pending'";
				// $this->db->where($where);
		    	$this->db->where('r.registration_status',$status);
		    	$this->db->where('s.student_status',1);
		    	// $this->db->or_where('r.registration_status',$status1);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');

		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function user_count1($status = '',$branch_id,$status1 = '')
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id','left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status!='')
		    {
		    	// $where = array('r.registration_status' => $status);
		    	// $where1 = array('r.registration_status' => $status1);
		    	// $this->db->where($where);
		    	// $this->db->or_where($where1);
		  	  	// $where = "r.registration_status='registered' OR r.registration_status='payment pending'";
				// $this->db->where($where);
		  	  	// $where = "r.registration_status='registered' OR r.registration_status='payment pending'";
				// $this->db->where($where);
		    	$this->db->where('r.registration_status',$status);
		    	$this->db->where('s.student_status',1);
		    	$this->db->where('r.branch_id',$branch_id);
		    	// $this->db->or_where('r.registration_status',$status1);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');

		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function get_data11($status,$id=0)
		{
			$column_order = array('s.student_roll_no','s.student_name','s.student_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_fee','r.registration_status');//set column field database for datatable orderable
			$column_search = array('s.student_roll_no','s.student_name','s.student_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_fee','r.registration_status'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order

			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status != '')
		    {
				$this->db->where('r.registration_status', $status);
				$this->db->where('s.student_status', 1);
		    }
		    $this->db->group_by('s.id');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}
		public function get_data22($status,$branch_id,$id=0)
		{
			$column_order = array('s.student_roll_no','s.student_name','s.student_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_fee','r.registration_status');//set column field database for datatable orderable
			$column_search = array('s.student_roll_no','s.student_name','s.student_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_fee','r.registration_status'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    if($status != '')
		    {
				$this->db->where('r.registration_status', $status);
				$this->db->where('s.student_status', 1);
				$this->db->where('r.branch_id',$branch_id);
		    }
		    $this->db->group_by('s.id');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}

		public function registered_students_count($status='')
		{
			$this->db->select('*,count(e.id) as email_count');
		     // $this->db->from('student s');
		    $this->db->from('uploads u');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    $this->db->join('student s', 's.id = u.student_id', 'left');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status!='')
		    {
		    	$this->db->where('r.registration_status',$status);

		    	$this->db->where('u.copy_of_paid_registration_slip IS NULL',NULL,FALSE);
				$this->db->or_where('u.photographs IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_form_b IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_guardian_cnic IS NULL',NULL,FALSE);
				$this->db->or_where('u.school_leaving_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.record_of_results IS NULL',NULL,FALSE);
				$this->db->or_where('u.merit_certificates IS NULL',NULL,FALSE);
				$this->db->or_where('u.gap_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.character_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.migration_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.registration_card IS NULL',NULL,FALSE);
				$this->db->or_where('u.equivalence_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.cancelation_of_result IS NULL',NULL,FALSE);

		    	$this->db->where('s.student_status', 1);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function registered_students_count1($status='',$branch_id)
		{
			$this->db->select('*,count(e.id) as email_count');
		     // $this->db->from('student s');
		    $this->db->from('uploads u');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    $this->db->join('student s', 's.id = u.student_id', 'left');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status!='')
		    {
		    	$this->db->where('r.registration_status',$status);

		    	$this->db->where('u.copy_of_paid_registration_slip IS NULL',NULL,FALSE);
				$this->db->or_where('u.photographs IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_form_b IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_guardian_cnic IS NULL',NULL,FALSE);
				$this->db->or_where('u.school_leaving_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.record_of_results IS NULL',NULL,FALSE);
				$this->db->or_where('u.merit_certificates IS NULL',NULL,FALSE);
				$this->db->or_where('u.gap_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.character_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.migration_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.registration_card IS NULL',NULL,FALSE);
				$this->db->or_where('u.equivalence_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.cancelation_of_result IS NULL',NULL,FALSE);

		    	$this->db->where('s.student_status', 1);
		    	$this->db->where('r.branch_id',$branch_id);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function get_registered_students($status,$id=0)
		{
			$column_order = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_status'); //set column field database for datatable orderable
			$column_search = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_status'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order

			$this->db->select('*,count(e.id) as email_count');
		    // $this->db->from('student s');
		    $this->db->from('uploads u');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    $this->db->join('student s', 's.id = u.student_id', 'left');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status != '')
		    {
				$this->db->where('r.registration_status', $status);
				
				$this->db->where('u.copy_of_paid_registration_slip IS NULL',NULL,FALSE);
				$this->db->or_where('u.photographs IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_form_b IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_guardian_cnic IS NULL',NULL,FALSE);
				$this->db->or_where('u.school_leaving_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.record_of_results IS NULL',NULL,FALSE);
				$this->db->or_where('u.merit_certificates IS NULL',NULL,FALSE);
				$this->db->or_where('u.gap_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.character_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.migration_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.registration_card IS NULL',NULL,FALSE);
				$this->db->or_where('u.equivalence_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.cancelation_of_result IS NULL',NULL,FALSE);

				$this->db->where('s.student_status', 1);
		    }
		    $this->db->group_by('s.id');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}
		public function get_registered_students1($status,$branch_id,$id=0)
		{
			$column_order = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_status');//set column field database for datatable orderable
			$column_search = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_status'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order

			$this->db->select('*,count(e.id) as email_count');
		    // $this->db->from('student s');
		    $this->db->from('uploads u');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    $this->db->join('student s', 's.id = u.student_id', 'left');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    // $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status != '')
		    {
				// $status = array('registered');
				$this->db->where('r.registration_status', $status);

				$this->db->where('u.copy_of_paid_registration_slip IS NULL',NULL,FALSE);
				$this->db->or_where('u.photographs IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_form_b IS NULL',NULL,FALSE);
				$this->db->or_where('u.copy_of_guardian_cnic IS NULL',NULL,FALSE);
				$this->db->or_where('u.school_leaving_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.record_of_results IS NULL',NULL,FALSE);
				$this->db->or_where('u.merit_certificates IS NULL',NULL,FALSE);
				$this->db->or_where('u.gap_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.character_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.migration_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.registration_card IS NULL',NULL,FALSE);
				$this->db->or_where('u.equivalence_certificate IS NULL',NULL,FALSE);
				$this->db->or_where('u.cancelation_of_result IS NULL',NULL,FALSE);

				$this->db->where('s.student_status', 1);
				$this->db->where('r.branch_id',$branch_id);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}

		public function file_completion_students_count($status='')
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status != '')
		    {
				$this->db->where('r.registration_status', $status);
				
				// $this->db->where('u.copy_of_paid_registration_slip IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.photographs IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_form_b IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_guardian_cnic IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.school_leaving_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.record_of_results IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.merit_certificates IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.gap_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.character_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.migration_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.registration_card IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.equivalence_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.cancelation_of_result IS NOT NULL',NULL,FALSE);

				$this->db->where('s.student_status',1);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function file_completion_students_count1($status='',$branch_id)
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status != '')
		    {
				$this->db->where('r.registration_status', $status);

				// $this->db->where('u.copy_of_paid_registration_slip IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.photographs IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_form_b IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_guardian_cnic IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.school_leaving_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.record_of_results IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.merit_certificates IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.gap_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.character_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.migration_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.registration_card IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.equivalence_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.cancelation_of_result IS NOT NULL',NULL,FALSE);

				$this->db->where('s.student_status',1);
				$this->db->where('r.branch_id',$branch_id);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function get_file_completion_students($status,$id=0)
		{
			$column_order = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_status');//set column field database for datatable orderable
			$column_search = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_status'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order

			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status != '')
		    {
				$this->db->where('r.registration_status',$status);
				// $this->db->where('s.student_status',1);
				// $this->db->where('r.student_registration_no IS NOT NULL');

				// $array = array(
				// 	'u.copy_of_paid_registration_slip !' => NULL,
				// 	'u.photographs !' => NULL,
				// 	'u.copy_of_form_b !' => NULL,
				// 	'u.copy_of_guardian_cnic !' => NULL,
				// 	'u.school_leaving_certificate !' => NULL,
				// 	'u.record_of_results !' => NULL,
				// 	'u.merit_certificates !' => NULL,
				// 	'u.gap_certificate !' => NULL,
				// 	'u.character_certificate !' => NULL,
				// 	'u.migration_certificate !' => NULL,
				// 	'u.registration_card !' => NULL,
				// 	'u.equivalence_certificate !' => NULL,
				// 	'u.cancelation_of_result !' => NULL
				// );
				// $this->db->or_where($array);

				// $this->db->where('u.copy_of_paid_registration_slip IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.photographs IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_form_b IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_guardian_cnic IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.school_leaving_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.record_of_results IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.merit_certificates IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.gap_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.character_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.migration_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.registration_card IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.equivalence_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.cancelation_of_result IS NOT NULL',NULL,FALSE);

				$this->db->where('s.student_status',1);

		    }
		    $this->db->group_by('s.id');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}
		public function get_file_completion_students1($status,$branch_id,$id=0)
		{
			$column_order = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_status');//set column field database for datatable orderable
			$column_search = array('s.student_roll_no','r.student_registration_no','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test','r.registration_status'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order

			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    $this->db->join('uploads u', 'u.student_id = s.id', 'left');
		    if($status != '')
		    {
				$this->db->where('r.registration_status', $status);

				// $this->db->where('u.copy_of_paid_registration_slip IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.photographs IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_form_b IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.copy_of_guardian_cnic IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.school_leaving_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.record_of_results IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.merit_certificates IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.gap_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.character_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.migration_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.registration_card IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.equivalence_certificate IS NOT NULL',NULL,FALSE);
				// $this->db->where('u.cancelation_of_result IS NOT NULL',NULL,FALSE);

				$this->db->where('s.student_status',1);
				$this->db->where('r.branch_id',$branch_id);
		    }
		    $this->db->group_by('s.id');
			//$this->db->order_by('r.registration_date', 'desc');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           }
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}
		
		public function all_students_count1()
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id','left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    // $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->group_by('s.id');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function all_students_count($branch_id)
		{
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id','left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    // $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->where('r.branch_id',$branch_id);
		    $this->db->group_by('s.id');
		    $get=$this->db->get();
			return $get->num_rows();
		}
		public function get_all_students1($id=0)
		{
			$column_order = array('s.student_roll_no','r.student_registration_no','r.registration_status','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test');//set column field database for datatable orderable
			$column_search = array('s.student_roll_no','r.student_registration_no','r.registration_status','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    // $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    $this->db->group_by('s.id');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           	}
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}
		public function get_all_students($branch_id,$id = 0)
		{
			$column_order = array('s.student_roll_no','r.student_registration_no','r.registration_status','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test');//set column field database for datatable orderable
			$column_search = array('s.student_roll_no','r.student_registration_no','r.registration_status','s.student_name','s.student_national_id','g.guardian_national_id','c.contact_cell','b.branch_name','r.registration_test'); //set column field database for datatable searchable
			$order = array('s.id' => 'desc'); // default order
			$this->db->select('*,count(e.id) as email_count');
		    $this->db->from('student s');
		    $this->db->join('email e', 's.id = e.student_id', 'left');
		    $this->db->join('registration r', 'r.student_id = s.id', 'left');
		    $this->db->join('classes cl', 'r.class_id = cl.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id = s.id', 'left');
		    $this->db->join('contact c', 'c.id = sc.contact_id', 'inner');
		    // $this->db->join('address a', 'a.contact_id = c.id', 'left');
		    $this->db->join('branch b', 'b.id = r.branch_id', 'left');
		    $this->db->join('student_guardian sg', 'sg.student_id = s.id', 'left');
		    $this->db->join('guardian g', 'g.id = sg.guardian_id', 'left');
		    // $this->db->where('r.branch_id',$branch_id);
		    $this->db->group_by('s.id');
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column 
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		           	}
		           $i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }

		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        $query = $this->db->get();
		        return $query->result_array();
		    }
		}
		// public function get_all_students($status='')
		// {
		// 	$this->db->select('*,count(e.id) as email_count');
		//     $this->db->from('student s');
		//     $this->db->join('email e', 's.id=e.student_id', 'left');
		//     $this->db->join('registration r', 'r.student_id=s.id', 'left');
		//     $this->db->join('classes cl','r.class_id=cl.id','left');
		//     $this->db->join('student_contact sc', 'sc.student_id=s.id', 'left');
		//     $this->db->join('contact c', 'c.id=sc.contact_id', 'inner');
		//     $this->db->join('address a', 'a.contact_id=c.id', 'left');
		//     if($status!='')
		//     {
		//     	$this->db->where('r.registration_status',$status);
		//     }
		//     $this->db->group_by('s.id');
		// 	$this->db->order_by('r.registration_date', 'desc');
		//     //$this->db->limit($limit, $start);         
		//     $query = $this->db->get(); 
		//     if($query->num_rows() > 0)
		//     {
		//         return $query->result_array();
		//     }
		//     else
		//     {
		//         return false;
		//     }
		// }
		public function get_all_branches()
		{
			$this->db->select('*');
		    $this->db->from('branch');
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get();
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function branches_contact($value='')
		{
			$this->db->select('*');
		    $this->db->from('branch b');
		    $this->db->join('branch_contact bc', 'bc.branch_id = b.id', 'left');
		    $this->db->join('contact c', 'c.id = bc.contact_id', 'left');
		    $this->db->join('address a', 'a.contact_id = bc.contact_id', 'left');
		    //$this->db->limit($limit, $start);
		    $query = $this->db->get();
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function get_offers($id=0)
		{
	    	// print_r($_POST);
			$column_order = array("o.student_roll_no","o.reference_no","o.description","o.company","o.market","o.client","o.offer","DATE(o.created_at)","o.sale_price","o.status","o.comment"); //set column field database for datatable orderable
			$column_search = array("o.id","o.reference_no","o.description","o.company","o.market","o.client","o.offer","DATE(o.created_at)","o.sale_price","o.status","o.comment"); //set column field database for datatable searchable
			$order = array('o.id' => 'asc'); // default order
			$this->db->select(array("o.*","DATE(o.created_at) as created_at","IF(o.manager_id>0,u.name,'') as site_manager"));
			$this->db->from("offers o");
	        $this->db->join("users u","u.id=o.manager_id","left");
	        $i = 0;
	        if($id==0)
	        {
		        foreach ($column_search as $key=>$item) // loop column
		        {
		            if($_POST['search']['value']) // if datatable send POST for search
		            {
		            	$search_value = $_POST['search']['value'];
		            	$search_text = $search_value;
		                if($i===0) // first loop
		                {
		                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		                    $this->db->like($item, $search_text);
		                }
		                else
		                {
		                    $this->db->or_like($item, $search_text);
		                }

		                if(count($column_search) - 1 == $i) //last loop
		                    $this->db->group_end(); //close bracket
		            }
	                else
	                if($_POST['columns']) // if datatable send POST for coulumn search
	                {
	                	$search_value = $_POST['columns'][$key]['search']['value'];
	                	$search_text = $search_value;
		                if($search_text!='')
		                {
		                    $this->db->where($item, $search_text);
		                }
		               /* if(count($column_search) - 1 == $i) //last loop
		               $this->db->group_end(); //close bracket*/
		           	}
	        		$i++;
		       	}
		        if(isset($_POST['order'])) // here order processing
		        {
		            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		        } 
		        else if(isset($order))
		        {
		            $order = $order;
		            $this->db->order_by(key($order), $order[key($order)]);
		        }
		        if($_POST['length'] != -1)
		            $this->db->limit($_POST['length'], $_POST['start']);
		        //echo $this->db->get_compiled_select();exit;
		        $query = $this->db->get();
		        return $query->result();
	    	}
		    else
		    {
		    	$this->db->where('o.id',$id);
		    	$query = $this->db->get();
		        return $query->row();
		    }
		}
		public function get_all_siblings($guardian_national_id)
		{
			$this->db->select('*');
		    $this->db->from('student s'); 
		    $this->db->join('student_guardian sg', 'sg.student_id=s.id', 'left');
		    $this->db->join('guardian g', 'g.id=sg.guardian_id', 'inner');
		    $this->db->where('g.guardian_national_id',$guardian_national_id);
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function get_student_meetings($student_id)
		{
			$this->db->select('*');
		    $this->db->from('meeting m'); 
		    $this->db->join('branch b', 'm.branch_id=b.id', 'left');
		    $this->db->where('m.student_id',$student_id);
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}

		public function update_data_in_table($table_name,$data,$columns)
		{
			/*if($column_value!=0){
				$this->db->where($column_name, $column_value);
			}*/
		    foreach ($columns as $column_name => $column_value) {
				$this->db->where($column_name, $column_value);
			}
		    $this->db->update($table_name, $data);
		    return true;
		}
		public function delete_data_from_table($table_name,$id)
		{
		    $this->db->delete_where($table_name, array('id' => $id));
		    return true;
		}
		public function create_data_in_table($table_name,$data)
		{
		    $this->db->insert($table_name, $data);
		    return true;
		}
		public function read_last_insert_id()
		{
		    $insert_id = $this->db->insert_id();
		    return  $insert_id;
		}
		public function read_data_from_table($table_name,$columns="")
		{
			/*if($column_value!=0){
				$this->db->where($column_name, $column_value);
			}*/
			if($columns!=""){
				foreach ($columns as $column_name => $column_value) {
					$this->db->where($column_name, $column_value);
				}
			}
			$this->db->select('*');
		    $this->db->from($table_name);
		    $query=$this->db->get();
		    if($query->num_rows() > 0)
		    {
		    	return $query->result_array();
		    }
		    else
		    {
		    	return false;
		    }
		}
		public function update_student_data($data,$student_id)
		{
			/*$this->db->join('registration r', 'r.student_id=s.id', 'left');
			$this->db->join('guardian g', 'g.student_id=s.id', 'left');
		    $this->db->join('student_contact sc', 'sc.student_id=s.id', 'left');
		    $this->db->join('contact c', 'c.id=sc.id', 'inner');
		    $this->db->join('address a', 'a.contact_id=c.id', 'left');*/
			$this->db->set($data['student']);
			$this->db->set($data['registration']);
			$this->db->set($data['guardian']);
			$this->db->set($data['contact']);
			$this->db->set($data['address']);
			$this->db->where('s.id',$student_id);
			$this->db->where('r.student_id=s.id');
			$this->db->where('g.student_id=s.id');
			$this->db->where('sc.student_id=s.id');
			$this->db->where('c.id=sc.contact_id');
			$this->db->where('a.contact_id=c.id');
			$this->db->update('student as s, registration as r, guardian as g, student_contact as sc, contact as c, address as a');
		    return true;
		}
		public function guardian_delete($id)
		{
			$this->db->delete('guardian', array('id' => $id));
			$this->db->delete('student_guardian', array('guardian_id' => $id));
		}
		public function get_registered_student_details($student_id)
		{
			$this->db->select('R.*,C.*');
			$this->db->from('student AS S');
			$this->db->join('registration AS R', 'R.student_id = S.id', 'left');
			$this->db->join('challan AS C', 'C.student_id = S.id', 'left');
			$this->db->where('S.id', $student_id);
			 $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function get_all_registered_students()
		{
			$this->db->select('*');
		    $this->db->from('student s');
		    $this->db->join('registration r', 'r.student_id=s.id', 'left');
		    // $this->db->join('student_guardian sg', 'sg.student_id=s.id', 'left');
		    // $this->db->join('guardian g', 'g.id=sg.guardian_id', 'inner');
		    // $this->db->join('guardian_contacts gc', 'gc.guardian_id=sg.guardian_id', 'left');
		    // $this->db->join('contact c', 'c.id=gc.contact_id', 'left');
		    $this->db->where('r.registration_status','registered');
		    //$this->db->limit($limit, $start);         
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
		public function all_registered_students()
		{
			$this->db->select('*');
		    $this->db->from('student s');
		    $this->db->join('registration r', 'r.student_id=s.id', 'left');
		    $this->db->join('classes cl', 'cl.id=r.class_id', 'left');
		    $this->db->join('branch b', 'b.id=r.branch_id', 'left');
		    $this->db->join('challan ch', 'ch.student_id=s.id', 'left');
		    $this->db->join('student_fees_discounts sfd', 'sfd.student_id=s.id', 'left');
		    $this->db->where('r.registration_status','registered');       
		    $query = $this->db->get(); 
		    if($query->num_rows() > 0)
		    {
		        return $query->result_array();
		    }
		    else
		    {
		        return false;
		    }
		}
	}
?>