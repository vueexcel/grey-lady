<template>
  <div>
    <div class="text-xs-right">
      <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="excel">
          <span class="font-weight-bold">Export to Excel</span>
      </v-btn>
      <v-btn small class="blue text-lighten ma-0" style="min-width:100px; color: #fff;" @click="save">
          <span class="font-weight-bold">Save</span>
      </v-btn>
    </div>

    <div class="headline mb-0 font-weight-bold">Scenario Name</div>
    <v-card>
      <v-layout>
        <v-flex xs6>
          <v-card-title>
            <div>
              <div class="headline text-blue">{{deal.name}}</div>
              <div>{{listing.details.location.address}}</div>
              <div>{{listing.details.beds}} beds,&nbsp;{{listing.details.baths}} baths, &nbsp; {{listing.details.livingArea}} sqft.</div>
              <div>Single Family Home</div>
            </div>
          </v-card-title>
        </v-flex>
        <v-flex xs6>
          <v-card-title class="d-block">
            <div class="headline">Scenario Notes</div>
            <div>{{scenario.scenario_notes}}</div>
          </v-card-title>
        </v-flex>
      </v-layout>
      <v-layout>
        <v-flex xs12>
          <div class="pa-3">
            <div class="headline">Description of Deal</div>
            <div style="white-space: pre-line;">{{deal.description}}</div>
          </div>
        </v-flex>
      </v-layout>
    </v-card>

    <div class="mt-4">
      <v-layout>
        <v-flex xs6>
          <div class="headline">Scenario Controls</div>
          <v-card>
            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Purchase Price</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="decrement('purchase')">
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input type="text" class="input_class" v-model="purchase">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('purchase')">
                    <span class="font-weight-bold">+</span>
                  </v-btn>
                </div>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Rennovation Cost</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="decrement('rennovation')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="rennovation">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('rennovation')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>


            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Target ARV</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="decrement('target')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="target">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('target')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Monthly Rent</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="decrement('monthly_rent')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="monthly_rent">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('monthly_rent')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Downpayment %</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="decrement('downpayment')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="downpayment">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('downpayment')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Operating Expense as % of revenue</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;"  @click="decrement('operating_expense')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="operating_expense">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('operating_expense')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Mortage Interest Rate</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;"   @click="decrement('mortage_IR')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="mortage_IR">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('mortage_IR')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Closing Cost</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;"  @click="decrement('closing_cost')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="closing_cost">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('closing_cost')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex xs7>
                <div class="pa-3 name">Other Monthly Recurring Cost</div>
              </v-flex>
              <v-flex xs5>
                <div class="pa-3">
                  <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;"  @click="decrement('monthly_recurring_cost')">
                  <span class="font-weight-bold">-</span>
                </v-btn>
                <input type="text" class="input_class" v-model="recurring_cost">
                <v-btn small class="blue text-lighten ma-0" style="min-width:25px; color: #fff;" @click="increment('monthly_recurring_cost')">
                  <span class="font-weight-bold">+</span>
                </v-btn>
                </div>
              </v-flex>
            </v-layout>
          </v-card>
        </v-flex>&nbsp;&nbsp;&nbsp;
        <v-flex xs6>
          <div class="headline">Overview</div>
          <v-card>
            <v-layout>
              <v-flex xs10>
                <div class="name pa-1 pl-3 mt-3">Purchase Price</div>
                <div class="name pa-1 pl-3">Rennovation Cost</div>
                <hr class="mt-1 mb-1">
                <div class="pa-1 name pl-3">Total Cost</div>
                <div class="pa-1 name pl-3">After Repair Value</div>
                <div class="pa-1 name pl-3">LTV</div>
                <div class="pa-1 name pl-3">Amount Financed</div>
                <hr class="mt-1 mb-1">
                <div class="pa-1 name pl-3">Downpayment</div>
                <div class="pa-1 name pl-3">Closing Costs</div>
                <hr class="mt-1 mb-1">
                <div class="pa-1 name pl-3 d-block">
                  Total Cash Needed
                  <span>(Reno incl. in mortgage)</span>
                </div>
                <div class="pa-1 namepl-3">Monthly Mortgage Payment</div>
                <hr class="mt-1 mb-1">
                <div class="pa-1 name pl-3">Total Cash Needed</div>
                <div class="pa-1 name pl-3">Monthly Mortgage Payment</div>
              </v-flex>
              <v-flex xs2>
                <div class="text-xs-right pa-1 mt-3 pr-3">$150,00</div>
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <hr class="mt-1 mb-1">
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <hr class="mt-1 mb-1">
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <hr class="mt-1 mb-1">
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <hr class="mt-1 mb-1">
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
                <div class="text-xs-right pa-1 pr-3">$150,00</div>
              </v-flex>
            </v-layout>
          </v-card>
          <div class="headline mt-4 mb-2">BRRR Stats</div>
          <v-card>
            <v-layout>
              <v-flex xs4>
                <div class="d-block pa-3 text-md-center">
                  <div>$200K</div>
                  <div>Total Cash Required</div>
                </div>
              </v-flex>
              <v-flex xs4>
                <div class="d-block pa-3 text-md-center">
                  <div>$420K</div>
                  <div>Min. ARV</div>
                </div>
              </v-flex>
              <v-flex xs4>
                <div class="d-block pa-3 text-md-center">
                  <div>-$200K</div>
                  <div>Cashflow @100% role</div>
                </div>
              </v-flex>
            </v-layout>
          </v-card>
        </v-flex>
      </v-layout>
    </div>
    <div class="mt-4">
      <v-layout>
        <v-flex xs12>
          <v-flex class="align-content-space-between d-flex">
            <v-flex class="headline" xs6>Cash flow and Metrics</v-flex>
            <v-flex class="text-xs-right" xs6>
            <a href="#" class="text-blue mr-2 anchor">1 Year monthly</a>
            <a href="#" class="text-blue mr-2 anchor">Major Year</a>
            <a href="#" class="text-blue anchor">Thirty Year</a>

            </v-flex> 
          </v-flex>
            <table>
          <thead>
            <tr>
              <th class="first_col" style="font-size:17px;">
              </th>
              <th v-for="n in 30" :key="n">
                <div class="link">
                  <span class="text-blue">Year {{n}}</span>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <div v-if="dataArray.length">
            <tr>
              <td class="first_col">Gross Rent</td>
                <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                  <span>{{data.financial_information.rent_to_value}}</span>
                </td>
              </tr>
            <tr>
              <td class="first_col">Vacancy</td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.operating_profit_and_loss.monthly.loss_to_vacancy}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col">Operating Income</td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{Number(data.operating_profit_and_loss.monthly.operating_income)}}</span>
              </td>
            </tr>
            <tr>
              
              <td class="first_col"><strong>Operating Expenses</strong></td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.operating_profit_and_loss.monthly.operating_expenses}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col">Net Operating Income</td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.operating_profit_and_loss.monthly.net_operating_income}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col">Loan Payments</td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.mortgage_information.loan_amount}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col">Cash flow</td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.financial_information.cash_on_cash}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col"><strong>Cap Rate</strong></td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.financial_information.cap_rate}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col">Cash on Cash</td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.financial_information.cash_on_cash}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col">Rent to Value</td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>{{data.financial_information.rent_to_value}}</span>
              </td>
            </tr>
            <tr>
              <td class="first_col">
                <strong>Loan to value</strong>
              </td>
              <td class="body_col" v-for="(data,index) in dataArray[0].new_calculated_fields_for_30years" :key="index">
                <span>123</span>
              </td>
            </tr>
            </div>
          </tbody>
        </table>
        </v-flex>
      </v-layout>
    </div>
    <!-- <div class="box box-default">
      <div class="box-body">
        <h4>30 Years Data</h4>
        <div style="overflow-x: auto">
          <table class="table-bordered">
            <thead>
              <tr>
                <th class="header">Year</th>
                <th class="header">Cap Rate</th>
                <th class="header">Cash on Cash</th>
                <th class="header">Rent To Value</th>
                <th class="header">Debt Coverage Ratio</th>
                <th class="header">Price</th>
                <th class="header">Downpayment</th>
                <th class="header">Loan Amount</th>
                <th class="header">Total Equity Needed</th>
                <th class="header">Property Value</th>
                <th class="header">Equity</th>
                <th class="header">Revenue</th>
                <th class="header">Loss To Vacancy</th>
                <th class="header">Operating Income</th>
                <th class="header">Operating Expenses</th>
                <th class="header">Net Operating Income</th>
                <th class="header">Mortgage Payment</th>
                <th class="header">Cash Profit</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(data, index) in yearData" :key="index">
                <td>{{data.year}}</td>
                <td>{{data.financial_information.cap_rate}}%</td>
                <td>{{data.financial_information.cash_on_cash}}%</td>
                <td>{{data.financial_information.rent_to_value}}%</td>
                <td>{{data.financial_information.debt_coverage_ratio}}%</td>
                <td>${{data.mortgage_information.price}}</td>
                <td>${{data.mortgage_information.downpayment}}</td>
                <td>${{data.mortgage_information.loan_amount}}</td>
                <td>${{data.mortgage_information.total_equity_needed}}</td>
                <td>${{data.mortgage_information.property_value}}</td>
                <td>${{data.mortgage_information.equity}}</td>
                <td>${{data.operating_profit_and_loss.monthly.revenue}}</td>
                <td>${{data.operating_profit_and_loss.monthly.loss_to_vacancy}}</td>
                <td>${{data.operating_profit_and_loss.monthly.operating_income}}</td>
                <td>${{data.operating_profit_and_loss.monthly.operating_expenses}}</td>
                <td>${{data.operating_profit_and_loss.monthly.net_operating_income}}</td>
                <td>${{data.operating_profit_and_loss.monthly.mortgage_payment}}</td>
                <td>${{data.operating_profit_and_loss.monthly.cash_profit}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> -->
  </div>
</template>

<style>
.header {
  padding: 6px 8px;
}

.input_class {
  border: 1px solid #d2d6de;
  width: 60px;
  vertical-align: middle;
}

.name{
  font-size: 15px;
}

.anchor{
  text-decoration: underline;
  font-size: 15px;
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
  min-width: 252px;
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
  min-width: 252px;
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
  data() {
    return {
      yearData: null,
      purchase: 1500,
      rennovation:1520,
      target:1500,
      monthly_rent:1500,
      downpayment:15,
      operating_expense:1500,
      mortage_IR:1500,
      closing_cost:1500,
      recurring_cost:1500,
      dataArray: []
    };
  },
  props: {
    listing: {
      type: Object,
      default: {}
    },
    deal: {
      type: Object,
      default: {}
    },
    scenario: {
      type: Object,
      default: {}
    }
  },
  created() {
    this.callApi();
    window.addEventListener("data", data => {
      this.yearData = data.detail[0]["new_calculated_fields_for_30years"];
      this.year();
    });
  },
  computed: {
  },
  methods: {
    decrement(value){
      if(value === 'purchase'){
        this.purchase--
      } else if(value === 'rennovation'){
        this.rennovation--
      } else if (value === 'target') {
        this.target--
      } else if(value === 'monthly_rent'){
        this.monthly_rent--
      } else if (value === 'downpayment') {
        this.downpayment--
      } else if (value === 'operating_expense') {
        this.operating_expense--
      } else if(value === 'mortage_IR'){
        this.mortage_IR--
      } else if (value === 'closing_cost') {
        this.closing_cost--
      } else if(value === 'monthly_recurring_cost'){
        this.recurring_cost--
      }
    },
    increment(value){
      if(value === 'purchase'){
        this.purchase++
      } else if(value === 'rennovation'){
        this.rennovation++
      } else if (value === 'target') {
        this.target++
      } else if(value === 'monthly_rent'){
        this.monthly_rent++
      } else if (value === 'downpayment') {
        this.downpayment++
      } else if (value === 'operating_expense') {
        this.operating_expense++
      } else if(value === 'mortage_IR'){
        this.mortage_IR++
      } else if (value === 'closing_cost') {
        this.closing_cost++
      } else if(value === 'monthly_recurring_cost'){
        this.recurring_cost++
      }
    },
    async callApi() {
      let payload = {
        listing_id: this.listing.id,
        purchase_price: this.purchase,
        rennovation_cost: this.rennovation,
        monthly_rent: this.monthly_rent,
        downpayment: this.downpayment,
        opex_percentage: this.opex_percentage,
        interest_rate: this.interest_rate
      };
      let url = `/api/secure?url=scenario&listing_id=${
        payload.listing_id
      }&purchase_price=${payload.purchase_price}&rennovation_cost=${
        payload.rennovation_cost
      }&monthly_rent=${payload.monthly_rent}&downpayment_percentage=${
        payload.downpayment
      }&opex_percentage=${payload.opex_percentage}&interest_rate=${
        payload.interest_rate
      }`;
      try {
        let response = await this.axios.get(url);
        this.dataArray = response.data
      } catch (error) {
        console.log(error);
      }
    },
    year() {
      var d = new Date();
      var n = d.getFullYear();
      let yearArray = [];
      for (var i = 0; i < this.yearData.length; i++) {
        this.yearData[i]["year"] = n;
        ++n;
      }
    }
  }
};
</script>


