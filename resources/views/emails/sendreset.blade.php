<!DOCTYPE html>
<html>
<head>
    <title>Finsuite</title>
</head>
<body style="background-color:#e4e4e4;">
    <div style="height:20px;"></div>
    <div class="card" style="width: 80%;margin-left: 10%;background-color: #fff;margin-top: 30px;margin-bottom: 30px;">
        
        <div class="container" style="padding:10px;">
            <div style="text-align:center;margin: 0 auto;">
                <img src="https://bizmeth.co.in/Finsuite/images/finsuite_logo.png" style="width:30%;">
            </div>
            <h1 style="text-align:center;color: #148CEB;">Password Reset Link</h1> 
            
            <div style="text-align:center;margin-top: 20px;margin-bottom: 30px;">
                @php $email = base64_encode($details['email']); @endphp
                <a  href="{{ url('reset-password') }}/{{ $email }}">
                    <button style="width: 150px;background-color: #148CE8;color: #fff;height: 50px;border: 1px solid #fff;border-radius: 6px;">Click Here</button>
                </a>
            </div>
        </div>
    </div>
    <div style="height:20px;"></div>
    
</body>
</html>