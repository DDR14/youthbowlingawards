<?php
session_start();
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YOUTH BOWLING AWARDS</title>
    <link rel="stylesheet" type="text/css" href="_/css/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="_/css/mystyles.css" media="screen">
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-7651007-23', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="_/js/jquery-1.6.min.js" type="text/javascript"></script>
    <script src="_/js/jquery.cycle.all.js" type="text/javascript"></script>
    <script type="text/xml">
    <oa:widgets>
      <oa:widget wid="2559022" binding="#slideshow" />
    </oa:widgets>
    </script>
</head>
<body id="about">
    <div class="container"> <!-- container -->
        <header> <!-- header -->
            <?php 
            include 'includes/db.php';
            $db = new db();
            include 'includes/header.php'; ?>      
        </header> <!-- end of header --> 
        <center>
            <div style="background: #333333; height: 5200px; width: 900px; border-radius: 25px">
                <center><br><h1 class="text">TAGS PRICING</h1><br>
                    <div style="float: right"><br><br><br><br><br><br><img src="images/sides/at.png" height="140px"></div><br><br><br>
                    
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px; float: center">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;SWAG TAGS</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="150px">Notes</th>
                              <th>Data</th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>.29</td>
                              <td>.24</td>
                              <td>.21</td>
                              <td>.18</td>
                              <td>.15</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>.48</td>
                              <td>.41</td>
                              <td>.38</td>
                              <td>.33</td>
                              <td>.30</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>.38</td>
                              <td>.31</td>
                              <td>.27</td>
                              <td>.23</td>
                              <td>.20</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>.43</td>
                              <td>.36</td>
                              <td>.32</td>
                              <td>.27</td>
                              <td>.23</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>.51</td>
                              <td>.42</td>
                              <td>.37</td>
                              <td>.32</td>
                              <td>.26</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>.58</td>
                              <td>.48</td>
                              <td>.42</td>
                              <td>.36</td>
                              <td>.30</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                   <!-- <div style="float: right"></div> -->
                </div>
                <div style="float: right"><br><br><br><br><br><img src="images/sides/ct.png" height="210px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;SKINNY TAGS</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="150px">Notes</th>
                              <th>Data</th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>.29</td>
                              <td>.24</td>
                              <td>.21</td>
                              <td>.18</td>
                              <td>.15</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>.48</td>
                              <td>.41</td>
                              <td>.38</td>
                              <td>.33</td>
                              <td>.30</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>.38</td>
                              <td>.31</td>
                              <td>.27</td>
                              <td>.23</td>
                              <td>.20</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>.43</td>
                              <td>.36</td>
                              <td>.32</td>
                              <td>.27</td>
                              <td>.23</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>.51</td>
                              <td>.42</td>
                              <td>.37</td>
                              <td>.32</td>
                              <td>.26</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>.58</td>
                              <td>.48</td>
                              <td>.42</td>
                              <td>.36</td>
                              <td>.30</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/bt.png" height="90px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;SHOE TAGS</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px;">
                        <tr>
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="150px">Notes</th>
                              <th>Data</th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>.35</td>
                              <td>.31</td>
                              <td>.29</td>
                              <td>.27</td>
                              <td>.24</td>
                        </tr>
                        <tr style="height: 120px">
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><img src="images/sides/dt.png" height="200px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;SPIRIT TAGS</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="150px">Notes</th>
                              <th>Data</th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>.58</td>
                              <td>.48</td>
                              <td>.42</td>
                              <td>.36</td>
                              <td>.30</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>.83</td>
                              <td>.70</td>
                              <td>.63</td>
                              <td>.55</td>
                              <td>.48</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>.73</td>
                              <td>.60</td>
                              <td>.53</td>
                              <td>.45</td>
                              <td>.38</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>.87</td>
                              <td>.72</td>
                              <td>.63</td>
                              <td>.54</td>
                              <td>.45</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>1.02</td>
                              <td>.84</td>
                              <td>.74</td>
                              <td>.63</td>
                              <td>.53</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>1.16</td>
                              <td>.96</td>
                              <td>.84</td>
                              <td>.72</td>
                              <td>.60</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/et.png" height="80px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;BADGE JR BAG TAG</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="150px">Notes</th>
                              <th>Data</th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>1.02</td>
                              <td>.88</td>
                              <td>.73</td>
                              <td>.58</td>
                              <td>.44</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>1.38</td>
                              <td>1.20</td>
                              <td>1.01</td>
                              <td>.83</td>
                              <td>.65</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>1.28</td>
                              <td>1.10</td>
                              <td>.91</td>
                              <td>.73</td>
                              <td>.55</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>1.53</td>
                              <td>1.32</td>
                              <td>1.10</td>
                              <td>.87</td>
                              <td>.66</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>1.79</td>
                              <td>1.54</td>
                              <td>1.28</td>
                              <td>1.02</td>
                              <td>.77</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>2.04</td>
                              <td>1.76</td>
                              <td>1.46</td>
                              <td>1.16</td>
                              <td>.88</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/ft.png" height="110px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;SHIELD JR BAG TAG</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="150px">Notes</th>
                              <th>Data</th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>1.02</td>
                              <td>.88</td>
                              <td>.73</td>
                              <td>.58</td>
                              <td>.44</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>1.38</td>
                              <td>1.20</td>
                              <td>1.01</td>
                              <td>.83</td>
                              <td>.65</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>1.28</td>
                              <td>1.10</td>
                              <td>.91</td>
                              <td>.73</td>
                              <td>.55</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>1.53</td>
                              <td>1.32</td>
                              <td>1.10</td>
                              <td>.87</td>
                              <td>.66</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>1.79</td>
                              <td>1.54</td>
                              <td>1.28</td>
                              <td>1.02</td>
                              <td>.77</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>2.04</td>
                              <td>1.76</td>
                              <td>1.46</td>
                              <td>1.16</td>
                              <td>.88</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><img src="images/sides/gt.png" height="155px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;RECTANGLE BAG TAG</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="80px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="140px">Notes</th>
                              <th>Data</th>
                              <th width="30px">25+</th>
                              <th width="30px">100+</th>
                              <th width="30px">250+</th>
                              <th width="30px">500+</th>
                              <th width="30px">750+</th>
                              <th width="30px">1500+</th>
                              <th width="30px">3000+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>1.75</td>
                              <td>1.50</td>
                              <td>1.25</td>
                              <td>1.00</td>
                              <td>.75</td>
                              <td>.72</td>
                              <td>.68</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>1.38</td>
                              <td>1.20</td>
                              <td>1.01</td>
                              <td>.83</td>
                              <td>.65</td>
                              <td>.83</td>
                              <td>.65</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>2.30</td>
                              <td>2.00</td>
                              <td>1.65</td>
                              <td>1.35</td>
                              <td>1.05</td>
                              <td>.95</td>
                              <td>.90</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>2.19</td>
                              <td>1.88</td>
                              <td>1.56</td>
                              <td>1.25</td>
                              <td>.94</td>
                              <td>.90</td>
                              <td>.85</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>2.63</td>
                              <td>2.25</td>
                              <td>2.19</td>
                              <td>1.75</td>
                              <td>1.31</td>
                              <td>1.26</td>
                              <td>1.19</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>3.50</td>
                              <td>3.00</td>
                              <td>2.50</td>
                              <td>2.00</td>
                              <td>1.50</td>
                              <td>1.44</td>
                              <td>1.36</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><br><br><img src="images/sides/ht.png" height="115px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;CIRCLE BAG TAG</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="80px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="140px">Notes</th>
                              <th>Data</th>
                              <th width="30px">25+</th>
                              <th width="30px">100+</th>
                              <th width="30px">250+</th>
                              <th width="30px">500+</th>
                              <th width="30px">750+</th>
                              <th width="30px">1500+</th>
                              <th width="30px">3000+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>2.10</td>
                              <td>1.80</td>
                              <td>1.50</td>
                              <td>1.20</td>
                              <td>.90</td>
                              <td>.86</td>
                              <td>.80</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>2.75</td>
                              <td>2.35</td>
                              <td>2.00</td>
                              <td>1.60</td>
                              <td>1.25</td>
                              <td>1.15</td>
                              <td>1.05</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>2.63</td>
                              <td>2.25</td>
                              <td>1.88</td>
                              <td>1.50</td>
                              <td>1.13</td>
                              <td>1.08</td>
                              <td>1.00</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>3.15</td>
                              <td>2.70</td>
                              <td>2.25</td>
                              <td>1.80</td>
                              <td>1.35</td>
                              <td>1.29</td>
                              <td>1.20</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>3.68</td>
                              <td>3.15</td>
                              <td>2.63</td>
                              <td>2.10</td>
                              <td>1.58</td>
                              <td>1.51</td>
                              <td>1.40</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>4.20</td>
                              <td>3.60</td>
                              <td>3.00</td>
                              <td>2.40</td>
                              <td>1.80</td>
                              <td>1.72</td>
                              <td>1.60</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><img src="images/sides/it.png" height="125px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;CUSTOM CIRCLE BAG TAG</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="80px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="140px">Notes</th>
                              <th>Data</th>
                              <th width="30px">25+</th>
                              <th width="30px">100+</th>
                              <th width="30px">250+</th>
                              <th width="30px">500+</th>
                              <th width="30px">750+</th>
                              <th width="30px">1500+</th>
                              <th width="30px">3000+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>2.10</td>
                              <td>1.80</td>
                              <td>1.50</td>
                              <td>1.20</td>
                              <td>.90</td>
                              <td>.86</td>
                              <td>.80</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>2.75</td>
                              <td>2.35</td>
                              <td>2.00</td>
                              <td>1.60</td>
                              <td>1.25</td>
                              <td>1.15</td>
                              <td>1.05</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>2.63</td>
                              <td>2.25</td>
                              <td>1.88</td>
                              <td>1.50</td>
                              <td>1.13</td>
                              <td>1.08</td>
                              <td>1.00</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>3.15</td>
                              <td>2.70</td>
                              <td>2.25</td>
                              <td>1.80</td>
                              <td>1.35</td>
                              <td>1.29</td>
                              <td>1.20</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>3.68</td>
                              <td>3.15</td>
                              <td>2.63</td>
                              <td>2.10</td>
                              <td>1.58</td>
                              <td>1.51</td>
                              <td>1.40</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>4.20</td>
                              <td>3.60</td>
                              <td>3.00</td>
                              <td>2.40</td>
                              <td>1.80</td>
                              <td>1.72</td>
                              <td>1.60</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/jt.png" height="100px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;MEGAPHONE BAG TAG</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="80px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="140px">Notes</th>
                              <th>Data</th>
                              <th width="30px">25+</th>
                              <th width="30px">100+</th>
                              <th width="30px">250+</th>
                              <th width="30px">500+</th>
                              <th width="30px">750+</th>
                              <th width="30px">1500+</th>
                              <th width="30px">3000+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>2.10</td>
                              <td>1.80</td>
                              <td>1.50</td>
                              <td>1.20</td>
                              <td>.90</td>
                              <td>.86</td>
                              <td>.80</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>2.75</td>
                              <td>2.35</td>
                              <td>2.00</td>
                              <td>1.60</td>
                              <td>1.25</td>
                              <td>1.15</td>
                              <td>1.05</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>2.63</td>
                              <td>2.25</td>
                              <td>1.88</td>
                              <td>1.50</td>
                              <td>1.13</td>
                              <td>1.08</td>
                              <td>1.00</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>3.15</td>
                              <td>2.70</td>
                              <td>2.25</td>
                              <td>1.80</td>
                              <td>1.35</td>
                              <td>1.29</td>
                              <td>1.20</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>3.68</td>
                              <td>3.15</td>
                              <td>2.63</td>
                              <td>2.10</td>
                              <td>1.58</td>
                              <td>1.51</td>
                              <td>1.40</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>4.20</td>
                              <td>3.60</td>
                              <td>3.00</td>
                              <td>2.40</td>
                              <td>1.80</td>
                              <td>1.72</td>
                              <td>1.60</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
                <div style="float: right"><br><br><br><br><br><br><br><br><img src="images/sides/kt.png" height="55px"></div><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 260px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;BOOKMARK BAG TAG</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px">
                        <tr>
                              <th width="80px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sides</th>
                              <th width="140px">Notes</th>
                              <th>Data</th>
                              <th width="30px">25+</th>
                              <th width="30px">100+</th>
                              <th width="30px">250+</th>
                              <th width="30px">500+</th>
                              <th width="30px">750+</th>
                              <th width="30px">1500+</th>
                              <th width="30px">3000+</th>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td></td>
                              <td>1.75</td>
                              <td>1.50</td>
                              <td>1.25</td>
                              <td>1.00</td>
                              <td>.75</td>
                              <td>.72</td>
                              <td>.68</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"></td>
                              <td>1 - Sided Color</td>
                              <td>1 Variable Image</td>
                              <td>2.30</td>
                              <td>2.00</td>
                              <td>1.65</td>
                              <td>1.35</td>
                              <td>1.05</td>
                              <td>.95</td>
                              <td>.90</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td></td>
                              <td>2.19</td>
                              <td>1.88</td>
                              <td>1.56</td>
                              <td>1.25</td>
                              <td>.94</td>
                              <td>.90</td>
                              <td>.85</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td></td>
                              <td>2.63</td>
                              <td>2.25</td>
                              <td>1.88</td>
                              <td>1.50</td>
                              <td>1.13</td>
                              <td>1.08</td>
                              <td>1.02</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 2.png"></td>
                              <td>2 - Sided Color / BW</td>
                              <td>Variable Data</td>
                              <td>3.06</td>
                              <td>2.63</td>
                              <td>2.19</td>
                              <td>1.75</td>
                              <td>1.31</td>
                              <td>1.26</td>
                              <td>1.19</td>
                        </tr>
                        <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/sides/Side 1.png"><img src="images/sides/Side 1.png"></td>
                              <td>2 - Sided Color / Color</td>
                              <td>Variable Data</td>
                              <td>3.50</td>
                              <td>3.00</td>
                              <td>2.50</td>
                              <td>2.00</td>
                              <td>1.50</td>
                              <td>1.44</td>
                              <td>1.36</td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div><br><h1 class="text">LANYARDS PRICING</h1>
                <div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/al.png" height="85px"></div><br><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 230px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 10px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;CUSTOM LANYARD</h1>
                      <table style="background: white; border-bottom-left-radius: 10px;border-bottom-right-radius: 10px; font-size: 15px">
                        <tr style="height: 35px">
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Length</th>
                              <th width="50px"></th>
                              <th width="50px"></th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                        </tr>

                        <tr style="height: 35px">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 19" x  3/4"</td>
                              <td style="width: 250px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;With Tag Order *</td>
                              <td>With Break Away</td>
                              <td>1.50</td>
                              <td>1.25</td>
                              <td>1.00</td>
                        </tr>

                        <tr style="height: 35px">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 19" x  3/4"</td>
                              <td style="width: 250px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Without Tag Order *</td>
                              <td>With Break Away</td>
                              <td>2.50</td>
                              <td>2.25</td>
                              <td>2.00</td>
                        </tr>

                        <tr style="height: 35px; background: white; border-radius: 100px">
                              <td colspan="6" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>*With minimum purchase of 500 tags</b></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div><div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/bl.png" height="90px"></div><br><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 230px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 10px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;font-size: 38px" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;CUSTOM BACKPACK LANYARD</h1>
                      <table style="background: white; border-bottom-left-radius: 10px;border-bottom-right-radius: 10px; font-size: 15px">
                        <tr style="height: 35px">
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Length</th>
                              <th width="50px"></th>
                              <th width="50px"></th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                        </tr>

                        <tr style="height: 35px">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4" x  3/4"</td>
                              <td style="width: 250px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;With Tag Order *</td>
                              <td>With Break Away</td>
                              <td>1.30</td>
                              <td>1.05</td>
                              <td>.80</td>
                        </tr>

                        <tr style="height: 35px">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4" x  3/4"</td>
                              <td style="width: 250px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Without Tag Order *</td>
                              <td>With Break Away</td>
                              <td>2.30</td>
                              <td>2.05</td>
                              <td>1.80</td>
                        </tr>

                        <tr style="height: 35px; background: white; border-radius: 100px">
                              <td colspan="6" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>*With minimum purchase of 500 tags</b></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                        </tr>
                      </table>
                    </div>
                   </center>
                </div><div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/cl.png" height="90px"></div><br><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 230px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;MINI LANYARD</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px;">
                        <tr style="height: 35px;">
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Length</th>
                              <th width="150px"></th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr style="height: 35px;">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 16" x 1/4"</td>
                              <td></td>
                              <td>.45</td>
                              <td>.35</td>
                              <td>.30</td>
                              <td>.25</td>
                              <td>.20</td>
                        </tr>
                        <tr style="height: 65px">
                        </tr>
                      </table>
                    </div>
                   </center>
                </div><div style="float: right"><br><br><br><br><br><br><br><img src="images/sides/dl.png" height="90px"></div><br><br><br><br>
                <div class="row" style="background: gray; border-radius: 35px; width: 660px; height: 230px;">
                  <center>
                    <div style="background: #1a53ff; color: black; border-radius: 15px; width: 630px; border-color: gray;">
                      <h1 style="font-weight: 600;" align="left" class="text2"> &nbsp;&nbsp;&nbsp;&nbsp;WRIST LANYARD</h1>
                      <table style="background: white; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; font-size: 15px;">
                        <tr style="height: 35px;">
                              <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Length</th>
                              <th width="150px"></th>
                              <th width="50px">25+</th>
                              <th width="50px">100+</th>
                              <th width="50px">250+</th>
                              <th width="50px">500+</th>
                              <th width="50px">750+</th>
                        </tr>
                        <tr style="height: 35px;">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.5" x 1/8"</td>
                              <td></td>
                              <td>.35</td>
                              <td>.25</td>
                              <td>.20</td>
                              <td>.15</td>
                              <td>.10</td>
                        </tr>
                        <tr style="height: 65px">
                        </tr>
                      </table>
                    </div>
                   </center>
                </div>
              </div></center>
            </div>
        </center>
        <?php include 'includes/footer.php'; ?>  
    </div> <!-- container -->
        <a id="toTop" href="#"><span class="glyphicon glyphicon-chevron-up"></span></a>
</body>
<script type="text/javascript">
$(document).ready(function()
 {
    // Hide the toTop button when the page loads.
 $("#toTop").hide();
});
 
 // This function runs every time the user scrolls the page.
 $(window).scroll(function(){
 
// Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
 if($(window).scrollTop() > 0){
 
// If it's more than or equal t o0, show the toTop button.
 console.log("is more");
 $("#toTop").fadeIn("slow");
 });
 else {
 // If it's less than 0 (at the top), hide the toTop button.
 console.log("is less");
 $("#toTop").fadeOut("slow");
 
});
 });
 
// When the user clicks the toTop button, we want the page to scroll to the top.
 $("#toTop").click(function(){
 
// Disable the default behaviour when a user clicks an empty anchor link.
 // (The page jumps to the top instead of // animating)
 event.preventDefault();
 
// Animate the scrolling motion.
 $("html, body").animate({
 scrollTop:0
 },"slow");
 
});

</script>

<style>
.strokeme
    {
    /*webkit-text-stroke: 1px white;
   color: white;
   text-shadow:
       3px 3px 0 white,
     -1px -1px 0 white,  
      1px -1px 0 white,
      -1px 1px 0 white,
       1px 1px 0 white;*/
    text-shadow: white 1px 0 10px;
    }
tr:nth-child(even) {background-color: #b3b3b3;}
tr:last-child td:first-child { border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px; }
.text
{
 color: rgba(0,0,0,.6);
background-color: gray;
text-shadow: rgba(0,0,0,.2) 2px 6px 5px,rgba(255,255,255,.4) 0 -4px 30px;
font-weight: bolder;
font-size: 70px;
font-style: italic;
}
.text2
{
 color: rgba(0,0,0,.6);
text-shadow: rgba(0,0,0,.2) 2px 6px 5px,rgba(255,255,255,.4) 0 -4px 30px;
font-weight: bolder;
font-size: 40px;
text-decoration: underline;
}
</style>