<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Page</title>
    <style>
        /* Page size for A4 */
        @page {
            size: A4;
            margin: 0;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 210mm;
            height: 297mm;
            border: 10px double #000;
            padding: 20mm;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content vertically */
            align-items: center;     /* Center content horizontally */
            text-align: center;      /* Center text within each section */
        }
        /* Header Section */
        .header img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .header p {
            font-size: 16px;
            margin: 5px 0;
        }
        /* Student Information Section */
        .student-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin: 20px 0;
        }
        .student-info .details {
            flex: 1;
            text-align: left;
        }
        .student-info .details h2 {
            font-size: 18px;
            margin: 0;
        }
        .student-info .details p {
            font-size: 16px;
            margin: 5px 0;
        }
        .student-info .student-img {
            text-align: right;
        }
        .student-info .student-img img {
            width: 120px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #000;
        }
        /* Scores Section */
        .scores {
            font-size: 20px;
            margin: 20px 0;
        }
        .scores h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }
        .scores p {
            font-size: 20px;
            margin: 5px 0;
        }
        /* Remarks and Issue Date */
        .remarks {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 40px;
        }
        .remarks .remark-section {
            text-align: left;
        }
        .remarks .issue-date {
            text-align: right;
        }

        table td {
            margin: 5;
            padding:10px;
            border: 2px solid #000;
            font-weight: bold;
            font-size: 20px;
        }

             /* Footer Section */
             .footer {
            width: 100%;
            margin-top: 50px;
            border-top: 1px solid #000;
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .footer .sign-section {
            text-align: left;
        }
        .footer .sign-section p {
            margin: 5px 0;
        }
        .footer .signature {
            margin-top: 40px;
            border-bottom: 1px solid #000;
            width: 200px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="<?=PUBLIC_URL.'/logo.jpg';?>" alt="School Logo">
            <h1><?=APP_NAME?></h1>
            <p>Registration Number: <?=$row['reg_number']?></p>
        </div>

        <!-- Student Information Section -->
        <div class="student-info">
            <div class="details">
                <h2>Student Name: <?=$row['first_name'].' '.$row['last_name']?></h2>
                <p>Class: <?=$row['class']?></p>
                <p>Session: <?=$row['session']?></p>
                <p>Term: <?=$row['term']?></p>
            </div>
            <div class="student-img">
                <img src="<?=PUBLIC_URL.'/thumb/'.$row['image'];?>" alt="Student Image">
            </div>
        </div>

        <!-- Scores Section -->
            <table width="100%" style="width:100%;border: 2px solid #000;">
                <tr>
                    <td>SCORES</td>
                    <td><?=$row['score']?></td>
                </tr>
            </table>

        <!-- Remarks and Issue Date Section -->
        <div class="remarks">
            <div class="remark-section">
                <h3>Remarks:</h3>
                <p><?=$row['performance']?></p>
            </div>
            <div class="issue-date">
                <p>Issue Date: <?=date('d D, M Y', strtotime($row['created_at']))?></p>
            </div>
        </div>

                <!-- Footer Section -->
                <div class="footer">
            <!-- Signature Section -->
            <div class="sign-section">
                <p><strong>Principal's Signature:</strong></p>
                <div class="signature">Signature Here</div>
            </div>
            <!-- Additional Footer Info (optional) -->
            <div class="sign-section">
                <p><strong>Teacher's Signature:</strong></p>
                <div class="signature">Signature Here</div>
            </div>
        </div>
    </div>
</body>

<script>

</script>
</html>
