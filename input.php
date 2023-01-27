<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>J&k Administration</title>
    <link rel="stylesheet" href="page.css" />
</head>

<body>
<div class="body">
    <div class="topbar">
        <ul>
            
            <li>
              <a href="login.html">Home</a>
            </li>
            <li class="last">
                <a href="#">Contact Us</a>
            </li>
        </ul>
        <br class="clear">
    </div>
    <div class="logo">
        <img src="images/Logo.png" />
    </div>
    <div class="jk">
        <p>Jammu & Kashmir Revenue Department<p>
        <!--<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Government_of_Jammu_and_Kashmir.svg/640px-Government_of_Jammu_and_Kashmir.svg.png"
            alt="logo" width="128" height="120" />-->
    </div>
    
    <div>
        <nav class="navbar-dark">
            <div class="container">
                <div class="topnav" id="navbar">
                    <a class="active" aria-current="page" href="page.html">Dashboard</a>
                    <a href="input.html">Inspection Details</a>
                    <a href="login.html" class="right">Logout</a>
                </div>
            </div>
        </nav>
    </div>

    <div id="inspection-form">
        <div id="sub-form">
            <form>
                <div class="hd">
                    <h2 style="color:brown;text-align:center; font-size:30px;font-family: Georgia, 'Times New Roman', Times, serif;">Details of Land</h2>
                </div>

                <div class="some-page-wrapper">

                    <div class="row">

                        <div class="column" id="tehsils">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="districts">District:</label>
                                    <select name="districts" id="districts" required>
                                        <option value="">Select a District</option>
                                        <option value="jammu">Jammu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="column" id="tehsils">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="tehsils">Tehsil:</label>
                                    <select name="tehsils" id="tehsils" required>
                                        <option value="">Select a Tehsil</option>
                                        <option value="bahu">Bahu</option>
                                        <option value="jammu">Jammu</option>
                                        <option value="jammu_north">Jammu North</option>
                                        <option value="jammu_south">Jammu South</option>
                                    </select><br />
                                </div>
                            </div>
                        </div>

                        <div class="column" id="patwar">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="patwar">Patwar Halqa:</label>
                                    <select name="patwar" id="patwar" required>
                                        <option value="">Select a Patwar Halka</option>
                                        <option value="bahu">Bahu</option>
                                        <option value="jammu">Jammu</option>
                                        <option value="jammu_north">Jammu North</option>
                                        <option value="jammu_south">Jammu South</option>
                                    </select><br />
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="column" id="land">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="land">Type of Land:</label>
                                    <select name="land" id="land" required>
                                        <option value="">Select Land Type</option>
                                        <option value="state">State</option>
                                        <option value="khc">Khacharie</option>
                                    </select><br />
                                </div>
                            </div>
                        </div>

                        <div class="column" id="lat-long">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="Enc">Latitude and Longitude:</label>
                                    <input type="text" id="latlong" name="latlong" placeholder="32.690339, 74.887375"
                                        required /><br />
                                </div>
                            </div>
                        </div>

                        <div class="column" id="recovered">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="recovered">Quantum of Land Recovered:</label>
                                    <input type="text" id="land" name="area" required />
                                </div>
                            </div>
                        </div>


                        
                    </div>

                    <div class="row">
                        <div class="column">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="name">Comments:</label>
                                    <input type="text" id="area" name="area" /><br />
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload an Image</label>
                                    <input type="file" class="form-control-file" id="exampleInputFile"
                                        accept="image/*" />
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="child-column">
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload a Video</label>
                                    <input type="file" class="form-control-file" id="exampleInputFile"
                                        accept="video/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btns">
                    <input type="submit" value="Submit" class="btn"/><br />
                    <input type="reset" class="btn" />
                </div>
        </div>
    </div>
    </form>
    </div>
    <div class="container common-container four_content carousel-container">
        <div id="flexCarousel" class="flexslider carousel">
           <ul class="slides">
              <li><a target="_blank" href="http://digitalindia.gov.in/"
                    title="Digital India, External Link that opens in a new window"><img
                       src="images/digital.jpeg" alt="Digital India"></a></li>
              <li><a target="_blank" href="http://www.makeinindia.com/"
                    title="Make In India, External Link that opens in a new window"> <img
                       src="Images/makeinindia.jpeg" alt="Make In India"></a></li>
              
              <li><a target="_blank" href="https://data.gov.in/"
                    title="Data portal, External Link that opens in a new window"><img
                       src="images/data.jpeg" alt="Data portal"></a></li>
              <li><a target="_blank" href="https://mygov.in/"
                    title="MyGov, External Link that opens in a new window"><img
                       src="images/mygov.jpeg" alt="MyGov Portal"></a></li>
           </ul>
        </div>
     </div>
<div class="footer-bottom-wrapper">
 <div class="footer-bottom-wrapper">
    <div class="container common-container four_content footer-bottom-container">
       <div class="footer-content">
          <!-- <div class="copyright-content"> Website Content Managed by <strong>Department Name, Ministry Name,
             </strong> -->
             <span>Designed, Developed and Hosted by
                <a target="_blank" title="JaKeGA, External Link that opens in a new window" href="https://jakega.jk.gov.in/">
                   <strong>Jammu and Kashmir eGovernance Agency</strong>
                </a>
                <strong> ( JaKeGA )</strong>
             </span>
          </div>
          <div class="last-updated">
             <strong>Last Updated: 23-01-2023</strong>
          </div>
       </div>
    </div>
</div>
</body>

</html>