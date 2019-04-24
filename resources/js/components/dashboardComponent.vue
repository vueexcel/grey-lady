<template>
        <div class="display_container">
            <div class="column_50">
                <h2 class="heading">Stream</h2>
                <div class="stream" v-if="showData.length"> 
                    <tr class="" v-for="(data, index) in showData" :key="index">
                        <div class="item">
                            <span class="font_size"><span class="time">{{data.timeDifference}}</span>
                                &nbsp;  <a href="" class="address">{{data.address}}</a>
                                &nbsp;  on &nbsp;
                                <a href="" class="address">{{data.site}}</a>
                            </span>
                        </div>
                    </tr>
                </div>
                <div class="stream" v-else>
                    <div class="item">Nothing Available</div>
                </div>
            </div>
            <div class="column_40">
                <h2 class="heading">News & Updates</h2>
                <div class="stream">
                    <div v-if="newsShow.length" class="news">
                        <div v-for="news in newsShow" :key="news.id">
                            <div class="heading">
                                <div class="set_title">
                                    {{news.title}}
                                </div>
                                <div><span v-if="news.created_at"> {{news.created_at}}</span>
                                <span v-else>No date</span></div>
                                <div class="">
                                    {{news.body}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="item">
                        No information is available
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import moment from 'moment'
export default {
    name:  "dashboard",
    props:{
        data:{type: Array},
        news: {type: Array},
    },
    computed: {
        showData() {
            if(this.data.length){
                this.data.forEach(element => {
                    element.address = element.address.charAt(0).toUpperCase() + element.address.slice(1);
                    element.site = element.site.charAt(0).toUpperCase() + element.site.slice(1);
                    let time =  this.getTimeDifference(element.updated_at)
                   element['timeDifference'] = time
                });
            }
            return this.data
        },
        newsShow(){
            return this.news
        },
    },
    methods: {
        getTimeDifference(updatedTime) {
            let currentTime = moment(new Date())
            let updated_Time = moment(new Date(updatedTime))
            var duration = moment.duration(updated_Time.diff(currentTime))
            var hourDifference = Math.round(duration.asMinutes())/60;
            hourDifference = hourDifference.toFixed(2)
            var timearray = hourDifference.split('.')
            if(hourDifference < 0){
                return Number(timearray[0])*-1 + ' hour ' + Number(timearray[1]) + ' min '
            } else{
                return Number(timearray[0]) + ' hour ' + Number(timearray[1]) + ' min '
            }
        },
    },
    mounted () {
        
    },
}
</script>

<style>
.font_size{
    font-size: 14px;
}
.set_title{
    font-size: 15px;
    font-weight: bold;
}
.column_50{
    padding: 0px 15px;
    width: 55%;
    -webkit-box-flex: 0;
}

.column_40{
    padding: 0px 15px;
    width: 45%;
    -webkit-box-flex: 0;
}
.stream{
    background-color: white;
    border: 2px solid #DCDCDC;
    padding-left: 15px;
}

.heading{
    margin-bottom: 1rem ;
}
.item{
    padding-bottom: 0.9rem;
    padding-top: 1rem;
}

.display_container{
    display: flex;
}

.news{
    margin-top:1.5rem;
    padding: 0rem 1.5rem; 
}
.time{
    font-size: 12px;
    color: grey;
}
.address{
    font-size: 15px;
}
.item a{
    text-decoration: underline;
}
</style>
