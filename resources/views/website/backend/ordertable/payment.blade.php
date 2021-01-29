$('#payment_type').change(function(){
    let paymentType = $("#payment_type option:selected" ).val(),
      salary =  $('#salary').val(),
      paidAmount =  $('#paid_amount').val(),
      remainingSalary = 0;
    if(paymentType === "Salary"){
      $('#paid_amount').prop('readonly', true);
      $('#paid_amount').val(salary);
      $('#remaining_salary').val(remainingSalary);
    } else if(paymentType === "Advance"){
      $('#paid_amount').prop('readonly', false).val('');
      remainingSalary = salary - paidAmount;
      $('#remaining_salary').val(remainingSalary);
    }else{
      $('#paid_amount').prop('readonly', false);
      $('#remaining_salary').val(salary);
      }
  });


  $('#paid_amount').keyup(function(){
    let paymentType = $("#payment_type option:selected" ).val(),
      salary =  $('#salary').val(),
      paidAmount =  $('#paid_amount').val(),
      remainingSalary =  $('#salary').val();
    if(paymentType === "Salary"){
      $('#remaining_salary').val(remainingSalary);
    } else if(paymentType === "Advance"){
      remainingSalary = salary - paidAmount;
      $('#remaining_salary').val(remainingSalary);
    }
    else{
      $('#remaining_salary').val(salary);
    }
  });
});

$('#employee_id').change(function(){
    let employeeId = $(this).val();
    $.ajax({
      method:'GET',
      url:`{{ url('employee/getSalary') }}/${employeeId}`,
      success: function(responseData){
        $('#payment_type').prop('disabled', false);
        $('#salary, #remaining_salary').val(responseData);
      }
    });
  });

  {{-- controller --}}
  public function getSalary($id = null)
    {
        if($id){
            $employee = Employee::find($id);
            $salary = $employee->salary;
            return $salary;
        }
    }

    <style>

      body,
      html {
          height: 100%;
          background-repeat: no-repeat;
          background-image: linear-gradient(rgb(104, 145, 162), rgb(217, 233, 221));
      }
  
      .card-container.card {
          max-width: 400px;
          padding: 40px 40px;
      }
  
      .btn {
          font-weight: 700;
          height: 36px;
          cursor: default;
      }
  
      /*
       * Card component
       */
      .card {
          background-color: #F7F7F7;
          /* just in case there no content*/
          padding: 20px 25px 30px;
          margin: 0 auto 25px;
          margin-top: 50px;
          /* shadows and rounded borders */
          box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      }
  
      .profile-img-card {
          width: 96px;
          height: 96px;
          margin: 0 auto 10px;
          display: block;
          border-radius: 50%;
      }
  
      /*
       * Form styles
       */
      .profile-name-card {
          font-size: 16px;
          font-weight: bold;
          text-align: center;
          margin: 10px 0 0;
          min-height: 1em;
      }
  
      .reauth-email {
          display: block;
          color: #404040;
          line-height: 2;
          margin-bottom: 10px;
          font-size: 14px;
          text-align: center;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
          
      }
  
      .form-signin #inputEmail,
      .form-signin #inputPassword {
          height: 44px;
          font-size: 16px;
      }
  
      .form-signin input[type=email],
      .form-signin input[type=password],
      .form-signin input[type=text],
      .form-signin button {
          width: 100%;
          display: block;
          margin-bottom: 10px;
          z-index: 1;
          position: relative;
          box-sizing: border-box;
      }
  
      .form-signin .form-control:focus {
          border-color: rgb(104, 145, 162);
          outline: 0;
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
      }
  
      .btn.btn-signin {
          /*background-color: #4d90fe; */
          background-color: rgb(104, 145, 162);
          /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
          padding: 0px;
          font-weight: 700;
          font-size: 14px;
          height: 36px;
          
          border-radius: 3px;
          border: none;
          -o-transition: all 0.218s;
          -moz-transition: all 0.218s;
          -webkit-transition: all 0.218s;
          transition: all 0.218s;
      }
  
      /* .btn.btn-signin:hover,
      .btn.btn-signin:active,
      .btn.btn-signin:focus {
          background-color: rgb(12, 97, 33);
      }
  
      .forgot-password {
          color: rgb(104, 145, 162);
      }
  
      .forgot-password:hover,
      .forgot-password:active,
      .forgot-password:focus {
          color: rgb(12, 97, 33);
      } */
  
  </style>