<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    h3 {
        margin-top: 5px;
    }

    .pdf_wrapper {
        text-align: center;
        width: 350px;
        height: 500px;
        border: 1px solid black;
        margin: 20px;
    }

    .challan_no {
        width: 15%;
        border: 1px solid black;
        float: left;
        margin-left: 22px;
    }

    .company {
        font-weight: bolder;
        border: 3px solid black;
        margin-top: 10px;
        padding: 1px;
    }

    .date {
        width: 76%;
        float: left;
        text-align: right;
    }

    .ms {
        margin-left: 18px;
        border-right: 3px solid black;
        padding-right: 10px;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .t-l {
        text-align: left;
    }

    .t-c {
        text-align: center;
    }

    .item {
        border: 3px solid black;
        height: 25% !important;
    }

    .job {
        border-bottom: 3px solid black;
    }
    </style>
</head>

<body>
    <div class="pdf_wrapper">
        <h3>MUNDAY INDUSTRIES</h3>
        <p>DASHMESH NAGAR H NO 1797/1 SNO 12/1 LUD</p>
        <h5>GSTIN-03ADVPS5504M1Z0</h5>

        <div style="width:340px;margin-top:10px;">
            <div class="challan_no">
                <span>1</span>
            </div>
            <div class="date">
                DATED 15.02.2020
            </div>
        </div>
        <br>

        <div class="company t-l">
            <span class="ms">M/S</span>
            <span style="margin-left: 20px;">ASHWINE POWDER COATING</span>
        </div>

        <div style="padding:5px 0;">
            <strong>GSTIN-03ADVPS5504M1Z0</strong>
        </div>
        <div class="item">
            ITEM PAGE
        </div>
        <div class="job">
            LABOUR JOB
        </div>
    </div>
</body>

</html>