@extends ('masterStu')
@section('content')
    <!DOCTYPE html>
    <html>
    <style>
        table {
            border: no border;
            text-align: left;
            font-size: 18px;
            margin-left: 200px;
        }

        .round {
            border-radius: 50%;
        }

        .b {
            width: 100px;
            margin-left: 20px;
            border-radius: 8px;
        }

        .b1 {
            background-color: white;
            color: black;
            border: 2px solid orange;
        }

        .b1:hover {
            background-color: orange;
            color: white;
        }
    </style>

    <h3 style="color:orange;font-size:39px;text-align:center;margin-top:-6%;">Student's Profile</h3>
    <br><br><br><br><br><br>
    <table>
        <tr>
            <th><img src="" style="height=150" ;width="150" ;></th>
        </tr>
        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Name:</th>
            <th>&emsp;&emsp;<input type="text" id="id" name="id" size="40" placeholder="Student's Name" required><br><br>
            </th>
        </tr>
        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Matric ID:</th>
            <th>&emsp;&emsp;<input type="text" id="studentID" name="studentID" size="40" value="11"
                    placeholder="Student's Matric ID"><br><br></th>
        </tr>
        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Address:</th>
            <th>&emsp;&emsp;<input type="text" id="id" name="id" size="40" placeholder="Student's Address" required><br><br>
            </th>
        </tr>
        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Phone Number:</th>
            <th>&emsp;&emsp;<input type="text" id="id" name="id" size="40" placeholder="Student's Phone Number"
                    required><br><br></th>
        </tr>
        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Email:</th>
            <th>&emsp;&emsp;<input type="text" id="id" name="id" size="40" placeholder="Student's Email Address"
                    required><br><br></th>
        </tr>

        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Year:<br><br></th>
            <th>&emsp;&emsp;<select id="year" name="type" required>
                    <option value="3">3</option>
                    <option value="4"> 4</option><br><br>
                </select></th>
        </tr>
        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Supervisor:</th>
            <th>&emsp;&emsp;<input type="text" id="id" name="id" size="40" placeholder="Supervisor's Name" required><br><br>
            </th>
        </tr>
        <tr>
            <th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PSM title:</th>
            <th>&emsp;&emsp;<input type="text" id="id" name="id" size="40" placeholder="Student's PSM title"
                    required><br><br></th>
        </tr>



    </table>
    <br><br>
    <input type="submit" class="b b1" value="Edit Profile" style="width:100px;margin-left:1000px;">
    <br><br>
    </form>

    </html>
@endsection
