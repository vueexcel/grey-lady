<template>
    <div>
        <div class="box box-default">
            <div class="box-body body">
                <h3>Download the Latest Version 
                    <span class="button"> 
                    <a target="_blank" href="https://drive.google.com/file/d/1ys_V3i0NuWopAddK0HTfXI6M4iN8uBUw/view">Download Zip File</a>
                    </span> 
                </h3>
                <p class="instruction">Here's a link to the latest version of the plugin. If you don't know how to install the plugin, here's a <a href="/chrome-extension-download-instructions">link to instructions</a>. Here's what's new:</p>
                <ul class="dashed">
                    <li>Major update to handle Chrome's new(ish) CORS standards. Was a breaking change for the plugin.</li>
                    <li>New parser for Zillow. Appears like they had an A/B test going. Which changed PDP HTML structure. Only tested it on for sale listings. Multis / rentals likely don't work.</li>
                    <li>Direct linking to the scenario tool back in the app for faster access.</li>
                    <li>Better error handling / messaging for common cases like not authed in app, etc..</li>
                    <li>Few minor UI tweaks / bug fixes.</li>
                </ul>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-body body">
                <h3>Older Builds</h3>
                <ul class="main_list">
                    <li>
                        <h4>0.1.3 - Release notes: 
                            <span class="link"><a href="https://drive.google.com/file/d/1-he2Nh44MXjuDpwDhL75a9Gjd_EBBPzi/view?usp=sharing">(Drive Download)</a></span>
                        </h4> 
                        <div>
                            {{newsToShow}}
                        </div>
                    <ul class="dashed">
                        <li>Rentals work on all supported websites: Zillow, Trulia and Realtor.com (not redfin)</li>
                        <li>Plugin will alert you when there's a new version available.</li>
                        <li>More useful linking back into the app for easier navigation of zip code / listing data.</li>
                        <li>Warning screen appears when listing can't be parsed rather than just failing silently.</li>
                        <li>Chrome plugin will now report back listing pages it can't parse so we can more easily see errors.</li>
                        <li>lots of little tweaks and bug fixes.</li>
                    </ul>
                    </li>
                    <li>0.1.2 - <a href="https://drive.google.com/file/d/1STaTZoPu1_BmWvs8K9tFpnQwfnELoWDE/view?usp=sharing">Drive Download</a> - For sale listings worked for all major portals, financial stats appeared, zip stats appeared.</li>
                    <li>0.1.1 - <a href="https://drive.google.com/file/d/1cxMA7CaZedZrViE1W8LOBckmFw0ExS-i/view?usp=sharing">Drive Download</a> - First shared version. Basic interface, only worked for redfin listings.</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted () {
        console.log('calling');
    },
    props:{
        news:{type: Array}
    },
    computed: {
        newsToShow() {
            console.log(this.news);
            
            return this.news 
        }
    },
}
</script>

<style>
.box.box-default{
    border: 2px solid #d2d6de;
}
.body{
    padding: 10px 40px; 
}

.body h3{
    margin-bottom: 35px;
    font-weight: 600;
}

.button{
    float: right;
}

.button a{
    font-size: 18px;
    background-color: #3D85BD;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px 15px;
}

.instruction{
    margin-bottom: 35px;
    font-weight: 600;
    font-size: 18px;
}

ul.dashed {
  list-style-type: none;
  padding-left: 0px;
  font-size: 15px;
}
ul.dashed > li {
  text-indent: -5px;
  margin-left: 5px;
}
ul.dashed > li:before {
  content: "-";
  font-weight: bold;
  text-indent: -5px;
  padding-right: 5px;
}

.main_list{
    list-style-type: none;
}
.main_list h4{
    font-weight: 600;
}

.main_list .link{
    margin-left: 15px;
}
</style>
