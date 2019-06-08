<template>
  <div class="display_container">
    <div class="column_50">
      <h2 class="heading">Stream</h2>
      <div class="stream" v-if="showData.length">
        <table class="table">
          <tr class v-for="(data, index) in showData" :key="index">
            <td class="item" width="25%">
              <span class="time">{{data.timeDifference}} ago</span>
            </td>
            <td class="item" width="45%">
              <a :href="data.link" target="_blank" class="address">{{data.address}}</a>
            </td>
            <!-- <td class="item text-center" width="10%">on</td> -->
            <td class="item text-left" width="20%">
              <span>on</span>
              <a :href="data.host" target="_blank" class="address">{{data.site}}</a>
            </td>
          </tr>
        </table>
      </div>
      <div class="stream" v-else>
        <div class="item">Nothing Available</div>
      </div>
    </div>
    <div class="column_40">
      <div class="deal_head">
          <span class="deal">Deals</span>
          <span class="all"><a class="text-primary" href="deals" > View All </a></span>
      </div>
      <div class="stream">
        <table class="table table-bordered" v-if="deals.length">
          <thead>
            <tr>
              <th scope="col">Deal Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(deal,index) in deals" :key="index">
              <td>{{deal.name}}</td>
              <td><a class="text-primary" :href="'/deal/'+deal.id" > Details </a></td>
            </tr>
          </tbody>
        </table>
        <div v-if="!deals.length" class="item">
          <p class="no_info">
             No information is available
          </p>
        </div>
      </div>
      <h2 class="heading">News &amp; Updates</h2>
      <div class="stream">
        <ul v-if="newsShow.length" class="news">
          <li v-for="news in newsShow" :key="news.id">
            <div class="heading">
              <div class="set_title">
                {{news.title}}
                <span class="button" v-if="news.version">
                  <a>{{ news.type }}</a>
                </span>
              </div>

              <div class="time">
                <span v-if="news.time">{{news.time}}</span>
                <span v-else>No date</span>
              </div>
              <div class v-html="news.body">{{news.body}}</div>
            </div>
          </li>
        </ul>
        <div v-else class="item">No information is available</div>
      </div>
    </div>
  </div>
</template>

<script>
import moment, { min } from "moment";
export default {
  name: "dashboard",
  props: {
    data: { type: Array },
    news: { type: Array },
    deals:{ type: Array}
  },
  created() {},
  computed: {
    showData() {
      var host = "";
      if (this.data.length) {
        this.data.forEach(element => {
          host = new URL(element.link);
          element["host"] = host.protocol + "//" + host.host;
          element.address =
            element.address.charAt(0).toUpperCase() + element.address.slice(1);
          element.site =
            element.site.charAt(0).toUpperCase() +
            element.site.slice(1) +
            ".com";
          let time = this.getTimeDifference(element.updated_at);
          element["timeDifference"] = time;
        });
      }
      return this.data;
    },
    newsShow() {
      if (this.news.length) {
        this.news.map(news => {
          news.title = this.capitalize_Words(news.title);
          news["time"] = moment(news.created_at).format("MMMM DD,YYYY");
        });
      }
      return this.news;
    }
  },
  methods: {
    capitalize_Words(str) {
      return str.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
      });
    },
    getTimeDifference(updatedTime) {
      var timearray = [];
      let currentTime = moment(new Date());
      let updated_Time = moment(new Date(updatedTime));
      var duration = moment.duration(updated_Time.diff(currentTime));
      if (Math.round(duration.asDays()) === 0) {
        var hourDifference = Math.round(duration.asMinutes());
        if (hourDifference < -60) {
          var hours = (hourDifference / 60).toFixed(2);
          var minDifference = hourDifference % 60;
          let hoursArray = hours.split(".");
          timearray[0] = Number(hoursArray[0]) * -1;
          timearray[1] = Number(minDifference) * -1;
          return (
            Number(timearray[0]) + " hour " + Number(timearray[1]) + " min "
          );
        } else {
          hourDifference = hourDifference.toFixed(2);
          var timearray = hourDifference.split(".");
          return (
            Number(timearray[0]) * -1 + " min " + Number(timearray[1]) + " sec "
          );
        }
      } else if (
        Math.round(duration.asDays()) < -30 &&
        Math.round(duration.asDays()) > -365
      ) {
        var monthDifference = (duration.asDays() / 30).toFixed(3);
        let montharray = monthDifference.split(".");
        var daysDifference = (duration.asDays() % 30).toFixed(3);
        let daysArray = daysDifference.split(".");
        timearray[0] = Number(montharray[0]) * -1;
        timearray[1] = Number(daysArray[0]) * -1;
        return (
          Number(timearray[0]) + " month " + Number(timearray[1]) + " days "
        );
      } else if (Math.round(duration.asDays()) < -365) {
        var yearDifference = duration.asYears().toFixed(2);
        let timearray = yearDifference.split(".");
        return (
          Number(timearray[0]) * -1 + " year " + Number(timearray[1]) + " day "
        );
      } else {
        var daysDifference = duration.asDays().toFixed(2);
        let timearray = daysDifference.split(".");
        return Number(timearray[0]) * -1 + " day ";
      }
    }
  },
  mounted() {}
};
</script>

<style>
.set_title {
  font-size: 18px;
  font-weight: 600;
  margin: 4px 0px;
}
.column_50 {
  padding: 0px 15px;
  width: 55%;
  -webkit-box-flex: 0;
}

.column_40 {
  padding: 0px 15px;
  width: 45%;
  -webkit-box-flex: 0;
}
.stream {
  background-color: white;
  border: 2px solid #dcdcdc;
  padding: 15px;
}

.heading {
  margin-bottom: 1rem;
}
.item {
  padding-bottom: 0.9rem;
  padding-top: 1rem;
}

.display_container {
  display: flex;
}

.news {
  margin-top: 1.3rem;
  padding: 0rem 1.5rem;
  list-style-type: none;
}
.time {
  font-size: 13px;
  color: grey;
  font-weight: 600;
  margin: 3px 0px;
}
.address {
  font-size: 15px;
  padding-left: 3px;
}
.item a {
  text-decoration: underline;
  color: #3d85bd;
}
.type {
  float: right;
}

.type button {
  background-color: #3d85bd;
  border-radius: 4px;
  color: white;
}

.news li {
  margin-bottom: 25px;
}
/* button CSS */
.button {
  float: right;
}

.button a {
  font-size: 16px;
  text-transform: capitalize;
  background-color: #3d85bd;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 6px 12px;
}

.deal{
  font-size: 30px;
}
.all{
  float: right;
  color: blue;
  padding-top: 15px;
  text-decoration: underline;
  cursor: pointer;
  margin-right: 15px;
  font-size: 15px;
}

.deal_head{
  margin-top: 1.2rem;
  margin-bottom: 0.7rem;
}

.no_info{
  font-weight: bold;
}
</style>
