<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>PSM Evaluation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        fon-family: "roboto", sans-serif;
    }

    header {
        position: fixed;
        background-color: #000000;
        padding: 5px;
        width: 100%;
        height: 70px;
    }

    .left h3 {
        color: #fff;
        margin: 0;
        text-transform: uppercase;
        font-size: 22px;
        font-weight: 900;
    }

    .left span {
        color: #1DC4E7;
    }

    .button:hover {
        color: orange;
    }

    .topnav a {
        float: right;
        vertical-align: top;
        color: white;
        text-align: center;
        font-family: Arial;
        text-decoration: none;
        font-size: 18px;
        margin-left: 1%;
        margin-right: 2%;
        margin-top: -1.5%;
    }


    .logout_btn {
        pading: 5px;
        background: #19B3D3;
        text-decoration: none;
        float: right;
        margin-top: -30px;
        margin-right: 40px;
        border-radius: 2px;
        font-size: 15px;
        font-weight: 600;
        color: #fff;
        transition: 0.05s;
        transition-property: background;
    }

    .logout_btn:hover {
        background: #0D9DBB;
    }

    .sidebar {
        background-color: #FF9900;
        margin-top: 70px;
        padding-top: 30px;
        position: fixed;
        left: 0;
        width: 250px;
        height: 150%;
        transition: 0.5s;
        transition-property: left;
    }

    .sidebar .profile_image {
        width: 100px;
        height: 100px;
        border-radius: 100px;
        margin-bottom: 10px;
    }

    .sidebar h4 {
        color: #fff;
        margin-top: 0;
        maqrgin-botton: 20px;
    }

    .sidebar a {
        color: #fff;
        display: block;
        width: 100%;
        line-height: 60px;
        text-decoration: none;
        padding-left: 40px;
        box-sizing: border-box;
        transiton: 0.5s;
        transition-property: background;
    }

    .sidebar a:hover {
        background: #19B3C3;
    }

    .sidebar i {
        padding-right: 10px;
    }

    label #sidebar_btn {
        z-index: 1;
        color: #fff;
        position: fixed;
        cursor: pointer;
        left: 420px;
        font-size: 20px;
        margin: 10px 0;
        transition-property: color;
    }

    label #sidebar_btn:hover {
        color: #19B3D3;
    }

    #check:checked~.sidebar {
        left: -190px;
    }

    #check:checked~.sidebar a span {
        display: none;
    }

    #check:checked~.sidebar a {
        font-size: 20px;
        margin-left: 160px;
        width: 80px;
    }

    .content {
        margin-left: 250px;
        margin-top: 0px;
        padding-top: 30px;
        background: #FFFFFF;
        background-position: center;
        background-size: cover;
        heighr: 200vh;
        transition: 0.5s;
    }

    #check:checked~.content {
        margin-left: 60px;
    }

    #check {
        display: none;
    }

    table2,
    th1 {
        border: no border;
        text-align: left;
        font-size: 11px;
        vertical-align: top;
    }

    .fa {
        padding: 5px;
        font-size: 20px;
        width: 20px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-linkedin {
        background: #007bb5;
        color: white;
    }

    .fa-instagram {
        background: #f09433;
        background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        background: -webkit-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f09433', endColorstr='#bc1888', GradientType=1);
        color: white;
    }

    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    footer {
        bottom: 0;
        background-color: #FFE4B5;
        background-size: cover;
        border-top: 1px solid #e5e5e5;
        font-size: 13px;
        clear: both;
        display: block;
        width: 100%;
        height: 200px;
    }

    div3 {
        margin-top: 70px;
        padding-top: 30px;
        position: fixed;
        background-color: #FFE4B5;
        font-size: 18px;
        width: 100%;
        height: 300px;
    }

    #rcorners {
        border-radius: 25px;
        border: 2px solid #000000;
        padding: 20px;
        width: 150px;
        height: 180px;
    }
</style>

<body>

    <input type="checkbox" id="check">
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <!--left-->
        <div class="left">
            <h3>University Malaysia <span> Pahang</span></h3>
        </div>
        <!--right-->
        <div class="topnav">
            <a class="button" href="/">Logout</a>
            <a class="button" href="/reportMainC">Generate Report</a>
            <a class="button" href="">Rubric</a>
            <a class="button" href="deadline">Deadline</a>
            <a class="button" href="">Supervisor's Profile</a>
            <a class="button" href="">Student's Profile</a>
            <a class="button" href="/Cmainpage">PSM Title List</a>
        </div>
    </header>

    <div class="sidebar">
        <center>

            <script>
                function checklogout() {
                    return confirm('Are you sure to Logout?');
                }
            </script>

        </center>
        <a href="#"><i class="far fa-id-card"></i></a>
        <a href="#"><i class="fas fa-phone"></i></a>
        <a href="#"><i class="fas fa-envelope-open-text"></i></a>
        <div style="background-color:#000000; height:3px;"></div>
        <a href="#"><i class="fas fa-folder-open"></i></a>
        <a href="#" onclick="return checklogout()"><i class="fas fa-door-open"></i><span>Logout</span></a>
    </div>

    <div class="content">
        <br><br><br>
        <img src=" {{ URL('umplogo.png') }} " alt="ump" width="200" height="100">
        <br><br><br>

        @yield('table')
        @yield('form')
        @yield('menu')


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <footer>
            <p>&emsp;&emsp;&emsp;&emsp; ABOUT UMP</p><br>
            <table2>
                <tr>
                    <th1 rowspan="2">&emsp;&emsp; <i style='font-size:21px' class='fas'>&#xf3c5;</i></th1>
                    <th1> &emsp;Universiti Malaysia Pahang<br>
                        &emsp;&emsp;&emsp;&emsp;&emsp;26600 Pekan<br>
                        &emsp;&emsp;&emsp;&emsp;&emsp;Pahang,Malaysia</th1>
                    <th1 rowspan="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i style='font-size:21px'
                            class='fas'>&#xf2a0;</i></th1>
                    <th1> &emsp; +609 424 5000</th1>
                    <th1 rowspan="2"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i style='font-size:21px'
                            class='fas'>&#xf658;</i></th1>
                    <th1> &emsp; pro@ump.edu.my</th1>
                </tr>

                <tr>
                    <th1 rowspan="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i style="font-size:21px"
                            class="fa">&#xf1ac;</i></th1>
                    <th1>&emsp; +609 424 5055 </th1>
                    <th1 rowspan="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i style='font-size:21px'
                            class='far'>&#xf017;</i></th1>
                    <th1>&emsp; Monday - Friday : 8:00 a.m. - 5:00p.m.</th1>
                </tr>
            </table2>
            <br><br>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            &emsp;&emsp;&emsp;&emsp;<a href="https://www.facebook.com/universiti.malaysia.pahang/"
                class="fa fa-facebook"></a>
            &emsp;&emsp;<a href="https://www.instagram.com/umpmalaysia/?hl=en" class="fa fa-instagram"></a>
            &emsp;&emsp;<a href="https://twitter.com/umpmalaysia?lang=en" class="fa fa-twitter"></a>
            &emsp;&emsp; <a href="https://www.linkedin.com/school/universiti-malaysia-pahang/"
                class="fa fa-linkedin"></a>
        </footer>
    </div>
</body>

</html>
