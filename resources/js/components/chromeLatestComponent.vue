<template>
  <div>
    <div class="box box-default">
      <div class="box-body body">
        <h3>
          {{news[0].title}}
          <span class="button" v-if="news[0].download_link">
            <a target="_blank" :href="news[0].download_link">Download Zip File</a>
          </span>
        </h3>
        <p class="instruction" v-html="news[0].body">
          {{ news[0].body }}
        </p>
      </div>
    </div>
    <div class="box box-default">
      <div class="box-body body">
        <h3>Older Builds</h3>
        <ul class="main_list">
          <li v-for="(news,index) in newsToShow" :key="index" class="news_list">
            <h4 v-if="news">
              {{news.title}} :              
              <span class="link" v-if="news.download_link">
                <a target="_blank" :href="news.download_link">(Download)</a>
              </span>              
            </h4>
            <div class="time">
              <span v-if="news.time">{{news.time}}</span>
              <span v-else>No date</span>
            </div>
            <div v-if="news">
              <div class="news_content" v-html="news.body">{{news.body}}</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import moment, { min } from "moment";
export default {
  data() {
    return {
      legacySystemHTML: ``
    }
  },
  mounted() {
  },
  props: {
    news: { type: Array }
  },
  computed: {
    newsToShow() {
      let newsArray = [];
      for (var i = 0; i <= this.news.length; i++) {
        if (i !== 0) {
          if (this.news[i]) {
            if( this.news[i].type == 'plugin' ){
              this.news[i]["time"] = moment(this.news[i].created_at).format(
                "MMMM DD,YYYY"
              );
              newsArray.push(this.news[i]);
            }
          }
        }
      }
      return newsArray;
    }
  }
};
</script>

<style>
.box.box-default {
  border: 2px solid #d2d6de;
}
.body {
  padding: 10px 40px;
}

.body h3 {
  margin-bottom: 35px;
  font-weight: 600;
}

.button {
  float: right;
}

.button a {
  font-size: 18px;
  background-color: #3d85bd;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 10px 15px;
}

.instruction {
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

.main_list {
  list-style-type: none;
  padding-left: 0px;
}

.main_list .news_list {
  margin-bottom: 40px;
}

.main_list h4 {
  font-weight: 600;
}

.main_list .link {
  margin-left: 15px;
}

.time {
  font-size: 13px;
  color: grey;
  font-weight: 600;
  margin: 3px 0px;
}

.news_content {
  margin-bottom: 15px;
}
</style>
