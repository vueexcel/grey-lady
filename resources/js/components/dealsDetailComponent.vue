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
        <div>
          <table class="table table-bordered">
            <thead>
              <tr class="row-fixed">
                <th scope="col" class="font-weight-bold font_size">Actions</th>
                <th scope="col">
                  <span class="head">Scenario Name</span>
                </th>
                <th scope="col">
                  <span class="head">Purchase Price</span>
                </th>
                <th scope="col">
                  <span class="head">Renovation (incl. in mortgage )</span>
                </th>
                <th>
                  <Strong>Total Cost</Strong>
                </th>
                <th scope="col">
                  <span class="head">After Repair Value</span>
                </th>
                <th scope="col">
                  <span class="head">Amount Financed</span>
                </th>
                <th scope="col">
                  <span class="head">Loan to value</span>
                </th>
                <th scope="col">
                  <Strong>Donwpayment</Strong>
                </th>
                <th scope="col">
                  <span class="head">Closing Cost</span>
                </th>
                <th scope="col">
                  <span class="head">Renovation (Not inc. in mortgage)</span>
                </th>
                <th scope="col">Total cash needed</th>
                <th scope="col">
                  <span class="head">Monthly mortgage payment (30yr)</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="dataScenario in scenario" :key="dataScenario.id">
                <td>
                  <span class="text-primary font-weight-bold font_size">Details / Delete</span>
                  <td ><span>{{dataScenario.scenario_name}}</span></td>
                  <td><span>{{dataScenario.purchase_price}}</span></td>
                  <td><span>{{dataScenario.renovation_inc_mortgage}}</span></td>
                  <td><span>{{dataScenario.total_cost}} </span></td>
                  <td><span>{{dataScenario.after_repair_value}}</span></td>
                  <td><span>{{dataScenario.amount_financed}}</span></td>
                  <td><span>{{dataScenario.loan_to_value}}</span></td>
                  <td><span>{{dataScenario.downpayment}}</span></td>
                  <td><span>{{dataScenario.closing_costs}}</span></td>
                  <td><span>{{dataScenario.renovation_not_inc_mortgage}}</span></td>
                  <td><span>{{dataScenario.total_cash_needed}}</span></td>
                  <td><span>{{dataScenario.monthly_mortgage_payment_30yr}}</span></td>
                </td>
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
    scenario: { type: Array }
  },
  computed: {
    dealObject() {
      return this.deal;
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

.column_size {
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

.head {
  font-weight: 400;
}

.table {
  background-color: #fff;
}

/* thead {
  float: left;
}

thead th {
  display: block;
}
table {
  display: flex;
} */
/* thead {
  float: left;   
}

thead th {
  display: block;   
}

tbody {
  float: right;   
} */
/* thead > tr {
  display: block;
  float: left;
} */
/* tbody > tr {
  display: block;
} */
.table>tbody>tr>td>tr>span{
  padding: 8px;
  line-height: 1.42857143;
  border-bottom-width: 2px;
}
</style>
