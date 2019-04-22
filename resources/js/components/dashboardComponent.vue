<template>
        <div class="row">
            <div class="col-md-7">
                <h2 class="mb-3">Stream</h2>
                <div class="bg-white pl-5 border"> 
                    <tr class="mb-4" v-for="(data, index) in showData" :key="index">
                    <div class="p-3">
                        <span class="font_size">{{data.timeDifference}},<a class="ml-3" href="">{{data.listing_address}}</a></span>
                    </div>
                </tr>
            </div>
        </div>
        <div class="col-md-5">
            <h2 class="mb-3">News & Updates</h2>
            <div class="bg-white pl-2 border pb-5 ">
                <div v-if="newsShow.length" class="mt-4 px-4">
                    <div v-for="news in newsShow" :key="news.id">
                        <div class="mb-3">
                            <div class="text-bold set_title">
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
                <div v-else>
                    No information is available
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:  "dashboard",
    props:{
        data:{type: Object},
        news: {type: Array},
    },
    computed: {
        showData() {
            if(this.data.data.favorite_listings.length){
                this.data.data.favorite_listings.forEach(element => {
                   let time =  this.getTimeDifference(element.updated_at)
                   element['timeDifference'] = time
                });
                return this.data.data.favorite_listings 
            }
        },
        newsShow(){
            return this.news
        },
    },
    methods: {
        getTimeDifference(updatedTime) {
            let currentTime = new Date()
            let updated_Time = new Date(updatedTime)
            var hourDifference = currentTime.getHours() - updated_Time.getHours()
            var minuteDifference = currentTime.getMinutes() - updated_Time.getMinutes()
            if(minuteDifference && hourDifference){
                return hourDifference + ' hour ' + minuteDifference + ' min ago '
            } else if(minuteDifference){
                return minuteDifference + ' min ago '
            } else {
                return hourDifference + ' hour ago '
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
    font-size: 12px;
}
</style>
