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
            <h1 style="text-align:center;color: #148CEB;">You're Invited to<br>Work on a Website</h1> 
            <div class="card" style="width: 80%;margin-left: 10%;background-color: #fff;margin-top: 10px;margin-bottom: 30px;text-align: center;">
                <p style="font-size:20px;">{{ $details['company_name'] }} has invited you to collaborate on their company</p> 
                <p style="font-size:18px;">
                    After you accept the invite, you can work on this site based on your assigned role. Simply click Accept and log in to your account.
                </p>
            </div>
           
            <div style="text-align:center;margin-top: 20px;margin-bottom: 30px;">
                <a  href="{{ url('register') }}">
                    <button style="width: 150px;background-color: #148CE8;color: #fff;height: 50px;border: 1px solid #fff;border-radius: 6px;">Accept Now</button>
                </a>
            </div>
        </div>
    </div>
    <div style="height:20px;"></div>
    
</body>
</html>