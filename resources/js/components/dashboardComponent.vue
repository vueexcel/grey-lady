<template>
        <div class="display_container">
            <div class="column_50">
                <h2 class="heading">Stream</h2>
                <div class="stream" v-if="showData.length">
                    <table class="table">
                        <tr class="" v-for="(data, index) in showData" :key="index">
                            <td class="item" width="25%"><span class="time">{{data.timeDifference}} ago</span></td>
                            <td class="item" width="50%"><a :href="data.link" target="_blank" class="address">{{data.address}}</a></td>
                            <td class="item text-center" width="5%">on</td>
                            <td class="item text-center" width="15%"><a :href="data.host" target="_blank" class="address">{{data.site}}</a></td>
                        </tr>
                    </table> 
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
                                <div class="time"><span v-if="news.time"> {{news.time}}</span>
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
            var host = ''
            if(this.data.length){
                this.data.forEach(element => {
                    host = new URL(element.link)
                    element['host'] = host.protocol + '//'+host.host
                    element.address = element.address.charAt(0).toUpperCase() + element.address.slice(1);
                    element.site = element.site.charAt(0).toUpperCase() + element.site.slice(1);
                    let time =  this.getTimeDifference(element.updated_at)
                   element['timeDifference'] = time
                });
            }
            return this.data
        },
        newsShow(){
            if(this.news.length){
                this.news.map(news =>{
                    news['time'] = moment(news.created_at).format('DD-MM-YYYY')
                })
            }
            return this.news
        },
    },
    methods: {
        getTimeDifference(updatedTime) {
            var timearray = []
            let currentTime = moment(new Date())
            let updated_Time = moment(new Date(updatedTime))
            var duration = moment.duration(updated_Time.diff(currentTime))
            if(Math.round(duration.asDays()) === 0){
                var hourDifference = (Math.round(duration.asMinutes()))
                if(hourDifference < -60){
                    var hourDifference = (hourDifference/60).toFixed(2);     
                    var timearray = hourDifference.split('.');
                    return Number(timearray[0])*-1 + ' hour ' + Number(timearray[1]) + ' min '
                } else {
                    hourDifference = hourDifference.toFixed(2)
                    var timearray = hourDifference.split('.')
                    return Number(timearray[0])*-1 + ' min ' + Number(timearray[1]) + ' sec '
                }
            } else if (Math.round(duration.asDays()) < -30 && Math.round(duration.asDays()) > -365){
                var monthDifference = (duration.asDays()/30).toFixed(3)
                let montharray = monthDifference.split('.')
                var daysDifference = (duration.asDays()%30).toFixed(3)
                let daysArray = daysDifference.split('.')
                timearray[0] = Number(montharray[0])*-1
                timearray[1] = Number(daysArray[0])*-1
                return Number(timearray[0]) + ' month ' + Number(timearray[1]) + ' days '
            } else if(Math.round(duration.asDays()) < -365){
                var yearDifference = duration.asYears().toFixed(2)
                let timearray = yearDifference.split('.')
                return Number(timearray[0])*-1 + ' year ' + Number(timearray[1]) + ' day '
            } else {
                var daysDifference = duration.asDays().toFixed(2)
                let timearray = daysDifference.split('.')
                return Number(timearray[0])*-1 + ' day ' 
            }
        }
    },
    mounted () {
        
    },
}
</script>

<style>
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
.time{
    color: grey;
}
</style>
