<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f6f8fa;
    font-family: 'Poppins', sans-serif;
}

.container{
    max-width: 700px;
    width: 100%;
    background: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1),
                0px 5px 12px -2px rgba(0, 0, 0, 0.1),
                0px 18px 36px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 10px;
}

.container .title{
    padding: 25px;
    background: #f6f8fa;
}

.container .title p{
    font-size: 25px;
    font-weight: 500;
    position: relative;
}

.container .title p::before{
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 3px;
    background: linear-gradient(to right, #F37A65, #D64141);
}

.user_details{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    padding: 25px;
}

.user_details .input_box{
    width: calc(100% / 2 - 20px);
    margin: 0 0 12px 0;
}

.input_box label{
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
}

.input_box label::after{
    content: " *";
    color: red;
}

.input_box input{
    width: 100%;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    padding-left: 15px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
    background-color: #f6f8fa;
    font-family: 'Poppins', sans-serif;
    transition: all 120ms ease-out 0s;
}


.input_box input:focus,
.input_box input:valid{
    box-shadow: 0px 0px 0px 2px #AC8ECE;
}
form .subject-wrapper {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

     form .subject-wrapper label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        
form .gender{
    padding: 0px 25px;
}

.gender .gender_title{
    font-size: 20px;
    font-weight: 500;
}

.gender .category{
    width: 80%;
    display: flex;
    justify-content: space-between;
    margin: 5px 0;
}

.gender .category label{
    display: flex;
    align-items: center;
    cursor: pointer;
}

.gender .category label .dot{
    height: 18px;
    width: 18px;
    background: #d9d9d9;
    border-radius: 50%;
    margin-right: 10px;
    border: 4px solid transparent;
    transition: all 0.3s ease;
}

#radio_1:checked ~ .category label .one,
#radio_2:checked ~ .category label .two,
#radio_3:checked ~ .category label .three{
    border-color: #d9d9d9;
    background: #D64141;
}

.gender input{
    display: none;
}

.reg_btn{
    padding: 25px;
    margin: 15px 0;
}

.reg_btn input{
    height: 45px;
    width: 100%;
    border: none;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    background: linear-gradient(to right, #F37A65, #D64141);
    border-radius: 5px;
    color: #ffffff;
    letter-spacing: 1px;
    text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
}

.reg_btn input:hover{
    background: linear-gradient(to right, #D64141, #F37A65);
}

@media screen and (max-width: 584px){

    .user_details{
        max-height: 340px;
        overflow-y: scroll;
    }

    .user_details::-webkit-scrollbar{
        width: 0;
    }

    .user_details .input_box{
        width: 100%;
    }

    .gender .category{
        width: 100%;
    }

}


@media screen and (max-width: 419px){
    .gender .category{
        flex-direction: column;
    }   
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: 10px;
    margin-bottom: 15px;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    padding: 10px;
    margin-bottom: 15px;
}

.alert ul {
    margin-top: 5px;
    margin-bottom: 0;
    padding-left: 20px;
}

.alert li {
    list-style-type: disc;
}
</style>

<!DOCTYPE html>
<html>
<head>
<title>student data form</title>
<!-- //web font -->
<script>
        // Function to set max date to today for date input
        function setMaxDateToday() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("dob").setAttribute('max', today);
        }
    </script>
</head>

<body onload="setMaxDateToday()">

<div class="container">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="title">
            <p>Student Data Form</p>
        </div>

        <form action="{{ route('students.store') }}" method="post" class="form-container">
        @csrf
            <div class="user_details">
            <div class="input_box">
                        <label for="name">Name:</label>
                        <input class="text" type="text" name="name" placeholder="Name" required="">
                    </div>
                    <div class="input_box">
                        <label for="dob">Date of Birth (DOB):</label>
                        <input class="text" type="date" name="dob" id="dob" placeholder="DOB" required="">
                    </div>
                    <div class="input_box">
                        <label for="admission_number">Admission Number:</label>
                        <input type="text" id="admission_number" name="admission_number" required="">
                    </div>
                    <div class="input_box">
                        <label for="father_name">Father's Name:</label>
                        <input type="text" id="father_name" name="father_name" required="">
                    </div>
                    <div class="input_box">
                        <label for="mother_name">Mother's Name:</label>
                        <input type="text" id="mother_name" name="mother_name" required="">
                    </div>
                    <div class="input_box">
                        <label for="class">Class:</label>
                        <input type="text" id="class" name="class" required="">
                    </div>
                    <div class="input_box">
                        <label for="division">Division:</label>
                        <input type="text" id="division" name="division" required="">
                    </div>
                    <div class="input_box">
                        <input type="hidden" >
                    </div>
                 <h5>Address</h5>
                 <div class="input_box">
                        <input type="hidden" >
                    </div>
                    <div class="input_box">
                        <label for="house_name">House Name:</label>
                        <input type="text" id="house_name" name="house_name" required="">
                    </div>
                    <div class="input_box">
                        <label for="post_office">Post Office:</label>
                        <input type="text" id="post_office" name="post_office" required="">
                    </div>
                    <div class="input_box">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" required="">
                    </div>
                    <div class="input_box">
                        <label for="pincode">Pincode:</label>
                        <input type="text" id="pincode" name="pincode" required="">
                    </div>
                  
                 <h5>Subjects</h5>
                 <div class="input_box">
                        <input type="hidden" >
                    </div>
                    @foreach ($subjects as $subject)
                        <div class="input_box">
                            <label for="marks[{{ $subject->id }}]">{{ $subject->name }}:</label>
                            <input type="number" name="marks[{{ $subject->id }}]" min="0" max="100" >
                        </div>
                    @endforeach
            </div>
            <div class="reg_btn">
            <input type="submit" value="Submit">            </div>
        </form>
    </div>
    </body>
    </html>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#pincode').on('blur', function() {
        var pincode = $(this).val();
        if (pincode) {
            $.ajax({
                url: '/get-address/' + pincode,
                type: 'GET',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        var postOffice = data[0]; // assuming you want the first post office in the list
                        $('#city').val(postOffice.District);
                        $('#post_office').val(postOffice.Name);
                    }
                },
                error: function(xhr) {
                    alert('Error fetching address.');
                }
            });
        }
    });
});
</script>