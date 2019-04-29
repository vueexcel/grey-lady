<template>
    <div>
        <div class="box box-default">
            <div class="box-body body">
                <h3>{{news[0].title}} 
                    <span class="button"> 
                    <a target="_blank" :href="news[0].download_link">Download Zip File</a>
                    </span> 
                </h3>
                <p class="instruction">{{news[0].body}}<a href="/chrome-extension-download-instructions">link to instructions</a>. Here's what's new:</p>
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
                    <li v-for="(news,index) in newsToShow" :key="index" class="news_list">
                        <h4 v-if="news">{{news.title}} : 
                            <span class="link"><a :href="news.download_link">(Drive Download)</a></span>
                        </h4> 
                        <div class="time"><span v-if="news.time"> {{news.time}}</span>
                            <span v-else>No date</span>
                        </div>
                        <div v-if="news">
                            <div class="news_content"> {{news.body}}</div>
                            <ul class="dashed">
                                <li>Rentals work on all supported websites: Zillow, Trulia and Realtor.com (not redfin)</li>
                                <li>Plugin will alert you when there's a new version available.</li>
                                <li>More useful linking back into the app for easier navigation of zip code / listing data.</li>
                                <li>Warning screen appears when listing can't be parsed rather than just failing silently.</li>
                                <li>Chrome plugin will now report back listing pages it can't parse so we can more easily see errors.</li>
                                <li>lots of little tweaks and bug fixes.</li>
                            </ul>
                        </div>
                    </li>
                 </ul>
            </div>
        </div>
    </div>
</template>

<script>
import moment,{ min } from 'moment'
export default {
    mounted () {
        console.log('calling');
    },
    props:{
        news:{type: Array}
    },
    computed: {
        newsToShow() {
            let newsArray = []
            for(var i=0; i <= this.news.length;i++){
                if(i !== 0){
                    if(this.news[i]){
                        this.news[i]['time'] = moment(this.news[i].created_at).format('MMMM DD,YYYY')
                        newsArray.push(this.news[i])
                    }
                }
            }
            return newsArray 
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
    padding-left: 0px;
}

.main_list .news_list{
    margin-bottom: 40px;
}

.main_list h4{
    font-weight: 600;
}

.main_list .link{
    margin-left: 15px;
}

.time{
    font-size: 13px;
    color: grey;
    font-weight: 600;
    margin: 3px 0px;
}

.news_content{
    margin-bottom: 15px;
}
</style>
