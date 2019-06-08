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
        <h1>
          Scenarios for
          <span>{{deal[0].name}}</span>
        </h1>
        <div class="bg-white">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" class="font-weight-bold font_size">Actions</th>
                <th scope="col"><span class="text-primary font-weight-bold font_size">Details / Delete</span></th>
                <th scope="col"><span class="text-primary font-weight-bold font_size">Details / Delete</span></th>
                <th scope="col"><span class="text-primary font-weight-bold font_size">Details / Delete</span></th>
              </tr>
            </thead>
            <tbody>
              {{scenarioArray}}
              <tr>
                <td class="column_size">Scenario Name</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td class="column_size">Purchase Price</td>
              </tr>
              <tr>
                <td class="column_size">Renovation (incl. in mortgage )</td>
              </tr>
              <tr>
                <td class="column_size"><Strong>Total Cost</Strong></td>
              </tr>
              <tr>
                <td class="column_size">After Repair Value</td>
              </tr>
              <tr>
                <td class="column_size">Amount Financed</td>
              </tr>
              <tr>
                <td class="column_size">Loan to value</td>
              </tr>
              <tr>
                <td class="column_size"><Strong>Donwpayment</Strong></td>
              </tr>
              <tr>
                <td class="column_size">Closing Cost</td>
              </tr>
              <tr>
                <td class="column_size">Renvation (Not inc. in mortgage)</td>
              </tr>
              <tr>
                <td class="column_size">Total cash needed</td>
              </tr>
              <tr>
                <td class="column_size">Monthly mortgage payment (30yr)</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    deal: { type: Array },
    scenario:{type: Array}
  },
  computed: {
    dealObject() {
      return this.deal;
    },
    scenarioArray(){
      this.scenario.forEach(scenario => {
        for(var key in scenario){
          console.log(scenario[key], key);
          
        }
      });
      return this.scenario
    }
  }
};
</script>

<style>
.deal_box {
  background-color: #fff;
  border: 2px solid #dcdcdc;
  padding: 20px 15px;
  min-height: 200px;
}

.font_size {
  font-size: 15px;
}

.column_size{
  font-size: 12px;
}

.address {
  margin-left: 15px;
  margin-top: 25px;
  font-size: 18px;
  font-weight: 600;
}

.left {
  float: left;
}

.right {
  float: right;
}
</style>
