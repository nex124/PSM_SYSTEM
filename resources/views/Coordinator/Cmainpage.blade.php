{{-- @extends ('masterC') --}}
{{-- @section('content') --}}
    <!DOCTYPE html>
    <html>
    <style>

        table {
            margin: auto;
            width: 95%;
            border-collapse: collapse;
            font-family: Arial;
            padding-bottom: 20px;
        }

        table th,
        td {
            border: 2px solid orange;
            height: 25px;
            text-align: center;
        }

        .search {
            width: 100px;
            margin-left: 20px;
            border-radius: 8px;
        }

        .search1 {
            background-color: white;
            color: black;
            border: 2px solid orange;
        }

        .search1:hover {
            background-color: orange;
            color: white;
        }

        .search {
            margin-left: 35px;
        }
    </style>
    <body>

    <h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">PSM Title List</h3>
    <br><br><br><br><br><br>
    <div class="table">
        <input style="width:80%;height:10%;font-size:18px;" type="text" class="search" id="myInput"
            onkeyup="search()" size="40" placeholder="Search">
        <input style="width:8%;height:12%;" type="reset" class="search search1" name="reset" value="RESET"><br><br><br>
        <table>
            <thead>
                <tr>
                    <th>PSM Ttile</th>
                    <th>Student's Name</th>
                    <th>Student's ID</th>
                    <th>Supervisor</th>
                    <th>Type of PSM</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>11</td>
                    <td>dd</td>
                    <td>dd</td>
                    <td>dd</td>
                    <td>dd</td>
                </tr>
            </tbody>


        </table>
        <br><br>
        <input type="submit" class="search search1" name="new" value="Insert New Profile"
            style="width:200px;margin-left:900px;">
        <br><br><br>
    </body>

    </html>
{{-- @endsection --}}
