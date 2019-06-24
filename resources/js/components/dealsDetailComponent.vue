<template>
  <div>
    <h1>{{dealObject[0].name}}</h1>
    <div class="deal_box">
      <div class="col-md-6">
        <div>
          <h4 class="font-weight-bold">{{deal[0].property_address}}</h4>
        </div>
        <div class="mt-4">
          <p>{{deal[0].beds}} beds, {{deal[0].baths}} baths, {{deal[0].living_area}}sqft</p>
          <p>Single family</p>
        </div>
      </div>
      <div class="col-md-6">
        <h4 class="font-weight-bold">Description of Deal</h4>
        <div class="mt-4 font_size">{{deal[0].description}}</div>
      </div>
    </div>
    <div class="mt-5">
      <div class="mt-5">
        <div class="table_heading">
          <span class="width_50">
            Scenarios for
            <span>{{deal[0].name}}</span>
          </span>
          <div class="view_all">
            <a href=""> Create New Scenario</a>
          </div>
        </div>

        <table>
          <thead>
            <tr>
              <th class="first_col" style="font-size:17px;">
                <strong>Action</strong>
              </th>
              <th v-for="(scene,index) in scenario" :key="index">
                <div class="link">
                  <a :href="'/scenario/run/'+dealObject[0]['listing_id'] + '?scenario_id='+scene.id">Detail </a> <a href="#" @click="deleteScenario(scene)">/ Delete</a>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="first_col">Scenario Name</td>
              <td class="body_col" v-for="(scenairo,index) in arrayScenario" :key="index">{{scenairo.scenario_name}}</td>
            </tr>
            <tr>
              <td class="first_col">Purchase Price</td>
              <td  class="body_col" v-for="(scenairo,index) in arrayScenario" :key="index">{{scenairo.purchase_price}}</td>
            </tr>
            <tr>
              <td class="first_col">Renovation (incl. in mortgage )</td>
              <td
              class="body_col"
                v-for="(scenairo,index) in arrayScenario"
                :key="index"
              >{{scenairo.renovation_inc_mortgage}}</td>
            </tr>
            <tr>
              
              <td class="first_col"><strong>Total Cost</strong></td>
              <td class="body_col" v-for="(scenairo,index) in arrayScenario" :key="index"><strong>{{scenairo.total_cost}}</strong></td>
            </tr>
            <tr>
              <td class="first_col">After Repair Value</td>
              <td 
              class="body_col"
                v-for="(scenairo,index) in arrayScenario"
                :key="index"
              >{{scenairo.after_repair_value}}</td>
            </tr>
            <tr>
              <td class="first_col">Amount Financed</td>
              <td
              class="body_col"
                v-for="(scenairo,index) in arrayScenario"
                :key="index"
              >{{scenairo.amount_financed}}</td>
            </tr>
            <tr>
              <td class="first_col">Loan To Value</td>
              <td class="body_col" v-for="(scenairo,index) in arrayScenario" :key="index">{{scenairo.loan_to_value}}</td>
            </tr>
            <tr>
              <td class="first_col"><strong>Downpayment</strong></td>
              <td class="body_col" v-for="(scenairo,index) in arrayScenario" :key="index"><strong>{{scenairo.downpayment}}</strong></td>
            </tr>
            <tr>
              <td class="first_col">Closing Costs</td>
              <td class="body_col" v-for="(scenairo,index) in arrayScenario" :key="index">{{scenairo.closing_costs}}</td>
            </tr>
            <tr>
              <td class="first_col">Renovation (Not Inc Mortgage)</td>
              <td
              class="body_col"
                v-for="(scenairo,index) in arrayScenario"
                :key="index"
              >{{scenairo.renovation_not_inc_mortgage}}</td>
            </tr>
            <tr>
              <td class="first_col">
                <strong>Total Cash Needed</strong>
              </td>
              <td
              class="body_col"
                v-for="(scenairo,index) in arrayScenario"
                :key="index"
              ><strong>{{scenairo.total_cash_needed}}</strong></td>
            </tr>
            <tr>
              <td class="first_col">Monthly mortgage payment (30yr)</td>
              <td
              class="body_col"
                v-for="(scenairo,index) in arrayScenario"
                :key="index"
              >{{scenairo.monthly_mortgage_payment_30yr}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
$(document).ready(function() {
  $("tbody").scroll(function(e) {
    //detect a scroll event on the tbody
    $("thead").css("left", -$("tbody").scrollLeft()); //fix the thead relative to the body scrolling
    $("thead th:nth-child(1)").css("left", $("tbody").scrollLeft()); //fix the first cell of the header
    $("tbody td:nth-child(1)").css("left", $("tbody").scrollLeft()); //fix the first column of tdbody
  });
});
export default {
  props: {
    deal: { type: Array },
    scenario: { type: Array }
  },
  computed: {
    dealObject() {
      return this.deal;
    },
    arrayScenario() {
      this.scenario.forEach(scenario => {
        scenario.purchase_price = "$" + scenario.purchase_price;
        scenario.renovation_inc_mortgage =
          "$" + scenario.renovation_inc_mortgage;
        scenario.total_cost = "$" + scenario.total_cost;
        scenario.after_repair_value = "$" + scenario.after_repair_value;
        scenario.amount_financed = "$" + scenario.amount_financed;
        scenario.loan_to_value = "%" + scenario.loan_to_value;
        scenario.downpayment = "$" + scenario.downpayment;
        scenario.closing_costs = "$" + scenario.closing_costs;
        scenario.renovation_not_inc_mortgage =
          "$" + scenario.renovation_not_inc_mortgage;
        scenario.total_cash_needed = "$" + scenario.total_cash_needed;
        scenario.monthly_mortgage_payment_30yr =
          "$" + scenario.monthly_mortgage_payment_30yr;
      });
      return this.scenario;
    }
  },
  methods: {
   async deleteScenario(scenario) {
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this scenario!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.deleteScenarioByApi(scenario);
        } else {
          swal("Your scenario is safe!");
        }
      });
      
      
    },
    async deleteScenarioByApi(scenario){
      let url  = `/api/secure/deleteScenario/${scenario.id}`
      try {
        let response = await this.axios.delete(url)
        if(response){
          swal("Poof! Your scenario has been deleted!", {
            icon: "success"
          });
          this.arrayScenario.forEach((scenariotoSplice, index) => {
            if (scenario.id === scenariotoSplice.id) {
              this.arrayScenario.splice(index, 1);
              this.$forceUpdate();
            }
          });
        }
      } catch(error){
        swal("Scenario can not be deleted! :(");
      }
    }
  },
  created () {
  },
};
</script>

<style>
.deal_box {
  background-color: #fff;
  border: 2px solid #dcdcdc;
  padding: 20px 15px;
  display: -webkit-box;
}

.font_size {
  font-size: 15px;
}

.column_size {
  font-size: 12px;
}

.address {
  margin-left: 15px;
  margin-top: 25px;
  font-size: 18px;
  font-weight: 600;
}



table {
  position: relative;
  width: 100%;
  max-width: 100%;
  background-color: #fff;
  overflow: hidden;
  border-collapse: collapse;
}

/*thead*/
thead {
  position: relative;
  display: block; /*seperates the header from the body allowing it to be positioned*/
  width: 1010px;
  overflow: visible;
}

thead th {
  background-color: #fff;
  min-width: 253px;
  height: 32px;
  border: 1px solid #dcdcdc;
}

thead th:nth-child(1) {
  /*first cell in the header*/
  position: relative;
}

/*tbody*/
tbody {
  position: relative;
  display: block; /*seperates the tbody from the header*/
  width: 1010px;
  height: 448px;
  overflow-x: scroll;
}

tbody td {
  min-width: 253px;
}

tbody tr td:nth-child(1) {
  /*the first cell in each tr*/
  position: relative;
  border: 1px solid #dcdcdc;
  background-color: #fff;
}

.first_col{
  width: 200px;
  padding: 7px !important;
  font-size: 15px;
  padding-left: 15px !important;
}

.link{
  font-size: 15px;
  text-align: center;
}

.body_col{
  text-align: center;
  border: 1px solid #dcdcdc;
  font-size: 15px;
}

.width_50{
  max-width: 50%;
  font-size: 25px;
}

.table_heading{
padding-top: 20px;
padding-bottom: 10px;
}

.view_all{
  float:right;
  margin-top: 5px;
  font-size: 20px;
  text-decoration: underline;
}
</style>
