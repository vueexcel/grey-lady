<template>
  <div>
    <div class="text-xs-right">
      <!-- <download-excel
        class="btn btn-default pa-0"
        :type="'csv'"
        :data="data"
        :fields="json_fields"
        name="excel.csv"
      >
      <div>-->
      <v-btn color="blue text-lighten ma-0 excel" style="min-width:25px; color: #fff;">
        <a
          class="font-weight-bold"
          style=" color: #fff;"
          :href="encodedUri"
          download="my_data.csv"
        >DOWNLOAD</a>
      </v-btn>
      <!-- </div>
      </download-excel>-->
      <v-btn small class="blue text-lighten ma-0" style=" color: #fff;" @click="save">
        <span class="font-weight-bold">Save</span>
      </v-btn>
    </div>

    <div class="headline mb-0 font-weight-bold" v-if="!editScenario">{{scenario.scenario_name}} <span @click="editSceanrioName">
    <i class="fa  fa-pencil ml-2"></i>
      </span></div>
      <div v-else class="headline mb-0 font-weight-bold w-25">
        <v-flex xs4>
        <v-text-field
            v-model="scenario.scenario_name"
            :rules="nameRules"
            label="Scenario name"
            required
            @keypress.enter="saveScenarioName"
          ></v-text-field>
        </v-flex>
      </div>
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('purchase')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="purchase"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('purchase')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('rennovation')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="rennovation"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('rennovation')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('target')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="target"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('target')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('monthly_rent')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="monthly_rent"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('monthly_rent')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('downpayment')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="downpayment"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('downpayment')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('operating_expense')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="operating_expense"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('operating_expense')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('mortage_IR')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="mortage_IR"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('mortage_IR')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('closing_cost')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="closing_cost"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('closing_cost')"
                  >
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
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="decrement('monthly_recurring_cost')"
                  >
                    <span class="font-weight-bold">-</span>
                  </v-btn>
                  <input
                    type="text"
                    class="input_class"
                    v-model="recurring_cost"
                    v-on:keyup.enter="callApi()"
                  >
                  <v-btn
                    small
                    class="blue text-lighten ma-0"
                    style="min-width:25px; color: #fff;"
                    @click="increment('monthly_recurring_cost')"
                  >
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
              <v-flex xs8>
                <div class="pa-2 overview mt-2">Purchase Price</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 mt-2 pr-3">${{purchase}}</div>
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Rennovation Cost</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">${{rennovation}}</div>
              </v-flex>
            </v-layout>
            <hr class="ma-0">
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">
                  <strong>Total Cost</strong>
                </div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">
                  <strong>${{total}}</strong>
                </div>
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">After Repair Value</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">${{rennovation}}</div>
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">LTV</div>
              </v-flex>
              <v-flex xs5>
                <!-- <div
                  class="text-xs-right pa-1 pl-2 pr-3"
                  v-if="dataArray.length"
                >${{dataArray[0].new_calculated_fields.operating_profit_and_loss.monthly.loss_to_vacancy}}</div>-->
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Amount Financed</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">$150,00</div>
              </v-flex>
            </v-layout>
            <hr class="ma-0">
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Downpayment</div>
              </v-flex>
              <v-flex xs5>
                <!-- <div
                  class="text-xs-right pa-1 pl-2 pr-3"
                  v-if="dataArray.length"
                >${{dataArray[0].new_calculated_fields.mortgage_information.downpayment}}</div>-->
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Closing Costs</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">$150,00</div>
              </v-flex>
            </v-layout>
            <hr class="ma-0">
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Total Cash Needed</div>
                <div class="pl-2">(Reno incl. in mortgage)</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">$150,00</div>
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Monthly Mortgage Payment</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">$150,00</div>
              </v-flex>
            </v-layout>
            <hr class="ma-0">
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Total Cash Needed</div>
                <div class="pl-2">(Reno not incl. in mortgage)</div>
              </v-flex>
              <v-flex xs5>
                <div class="text-xs-right pa-1 pl-2 pr-3">$150,00</div>
              </v-flex>
            </v-layout>
            <v-layout>
              <v-flex xs8>
                <div class="pa-1 pl-2 overview">Monthly Mortgage Payment</div>
              </v-flex>
              <v-flex xs5>
                <!-- <div
                  class="text-xs-right pa-1 pl-2 pr-3"
                  v-if="dataArray.length"
                >${{dataArray[0].new_calculated_fields.mortgage_information.monthly.payment !== 'NaN' ? dataArray[0].new_calculated_fields.mortgage_information.monthly.payment : 0 }}</div>-->
              </v-flex>
            </v-layout>
          </v-card>
          <div class="headline mt-2 mb-2">BRRR Stats</div>
          <v-card>
            <v-layout>
              <v-flex xs4>
                <div class="d-block pa-1 text-md-center">
                  <div>$200K</div>
                  <div>Total Cash Required</div>
                </div>
              </v-flex>
              <v-flex xs4>
                <div class="d-block pa-1 text-md-center">
                  <div>$420K</div>
                  <div>Min. ARV</div>
                </div>
              </v-flex>
              <v-flex xs4>
                <div class="d-block pa-1 text-md-center">
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
              <a class="text-blue mr-2 anchor" @click="selectDuration(1)">1 Year monthly</a>
              <a class="text-blue mr-2 anchor" @click="selectDuration(5)">Major Year</a>
              <a class="text-blue anchor" @click="selectDuration(30)">Thirty Year</a>
            </v-flex>
          </v-flex>
          <table>
            <thead>
              <tr>
                <th class="first_col" style="font-size:17px;"></th>
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
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>
                      $
                      {{data.operating_profit_and_loss.monthly.revenue !== 'NaN'
                      ? data.operating_profit_and_loss.monthly.revenue : 0}}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">Vacancy</td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>${{data.operating_profit_and_loss.monthly.loss_to_vacancy !== 'NaN' ? data.operating_profit_and_loss.monthly.loss_to_vacancy : 0}}</span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">Operating Income</td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>
                      $
                      {{data.operating_profit_and_loss.monthly.operating_income !== 'NaN' ?
                      data.operating_profit_and_loss.monthly.operating_income :
                      0}}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">
                    <strong>Operating Expenses</strong>
                  </td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>
                      $
                      {{data.operating_profit_and_loss.monthly.operating_expenses !== "NaN" ?
                      data.operating_profit_and_loss.monthly.operating_expenses
                      : 0}}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">Net Operating Income</td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>${{data.operating_profit_and_loss.monthly.net_operating_income !== "NaN" ? data.operating_profit_and_loss.monthly.net_operating_income : 0}}</span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">Loan Payments</td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>${{data.mortgage_information.loan_amount !== 'NaN' ? data.mortgage_information.loan_amount : 0}}</span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">Cash flow</td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>${{data.financial_information.cash_on_cash !== 'NaN' ? data.financial_information.cash_on_cash : 0}}</span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">
                    <strong>Cap Rate</strong>
                  </td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>
                      {{data.financial_information.cap_rate !== 'NaN' ?
                      data.financial_information.cap_rate
                      : 0}}%
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">Cash on Cash</td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>
                      {{data.financial_information.cash_on_cash !== 'NaN' ?
                      data.financial_information.cash_on_cash :
                      0}}%
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">Rent to Value</td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>
                      {{data.financial_information.rent_to_value !== 'NaN' ?
                      data.financial_information.rent_to_value :
                      0}}x
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="first_col">
                    <strong>Loan to value</strong>
                  </td>
                  <td class="body_col" v-for="(data,index) in arrayToShow" :key="index">
                    <span>{{data.loan_to_value}}x</span>
                  </td>
                </tr>
              </div>
            </tbody>
          </table>
        </v-flex>
      </v-layout>
    </div>
  </div>
</template>

<style>
.header {
  padding: 6px 8px;
}

.overview {
  font-size: 15px;
}

.excel {
  height: 28px;
  font-size: 13px;
}

.input_class {
  border: 1px solid #d2d6de;
  width: 60px;
  vertical-align: middle;
}

.name {
  font-size: 15px;
}

.anchor {
  cursor: pointer;
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

.first_col {
  width: 200px;
  padding: 7px !important;
  font-size: 15px;
  padding-left: 15px !important;
}

.link {
  font-size: 15px;
  text-align: center;
}

.body_col {
  text-align: center;
  border: 1px solid #dcdcdc;
  font-size: 15px;
}

.width_50 {
  max-width: 50%;
  font-size: 25px;
}

.table_heading {
  padding-top: 20px;
  padding-bottom: 10px;
}

.view_all {
  float: right;
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
      purchase: 150000,
      rennovation: 0,
      target: 150000,
      monthly_rent: 1500,
      downpayment: 25,
      operating_expense: 15,
      mortage_IR: 5,
      closing_cost: 10000,
      recurring_cost: 0,
      dataArray: [],
      duration: 30,
      arrayToShow: [],
      data: [],
      encodedUri: [],
      editScenario : false
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
    this.callFunction();
  },
  computed: {
    total() {
      return Number(this.purchase) + Number(this.rennovation);
    }
  },
  methods: {
    async callFunction() {
      await this.callApi();
      await this.setdataArray();
    },
    decrement(value) {
      if (value === "purchase") {
        this.purchase--;
      } else if (value === "rennovation") {
        this.rennovation--;
      } else if (value === "target") {
        this.target--;
      } else if (value === "monthly_rent") {
        this.monthly_rent--;
      } else if (value === "downpayment") {
        this.downpayment--;
      } else if (value === "operating_expense") {
        this.operating_expense--;
      } else if (value === "mortage_IR") {
        this.mortage_IR--;
      } else if (value === "closing_cost") {
        this.closing_cost--;
      } else if (value === "monthly_recurring_cost") {
        this.recurring_cost--;
      }
      this.callApi();
    },
    increment(value) {
      if (value === "purchase") {
        this.purchase++;
      } else if (value === "rennovation") {
        this.rennovation++;
      } else if (value === "target") {
        this.target++;
      } else if (value === "monthly_rent") {
        this.monthly_rent++;
      } else if (value === "downpayment") {
        this.downpayment++;
      } else if (value === "operating_expense") {
        this.operating_expense++;
      } else if (value === "mortage_IR") {
        this.mortage_IR++;
      } else if (value === "closing_cost") {
        this.closing_cost++;
      } else if (value === "monthly_recurring_cost") {
        this.recurring_cost++;
      }
      this.callApi();
    },
    setdataArray() {
      let grossRent = [];
      let vacancy = [];
      let operatingIncome = [];
      let operatingExpense = [];
      let netOperatingIncome = [];
      let loanPayment = [];
      let cashFlow = [];
      let capRate = []
      let cashOnCash = []
      let rentToLoan = []
      let loanToValue = []


      let fivegrossRent = [];
      let fivevacancy = [];
      let fiveoperatingIncome = [];
      let fiveoperatingExpense = [];
      let fivenetOperatingIncome = [];
      let fiveloanPayment = [];
      let fivecashFlow = []
      const rows = [
        [
          "Property Address",
          "Beds",
          "Baths",
          "Square Feet",
          "Deal Name",
          "Deal Description",
          "Scenario Name",
          "Purchase_Price",
          "Rennovation Cost",
          "Target ARV",
          "Downpayment",
          "Mortgage Interest Rate 30Yr",
          "Closing_cost",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          "",
          ""
        ]
      ];
      let emptyObj = [];
      for (var key in this.deal) {
        if (key === "property_address") {
          emptyObj[0] = this.deal[key].replace(/,/g, "");
        } else if (key === "beds") {
          emptyObj[1] = this.deal[key];
        } else if (key === "baths") {
          emptyObj[2] = this.deal[key];
        } else if (key === "living_area") {
          emptyObj[3] = this.deal[key];
        } else if (key === "name") {
          emptyObj[4] = this.deal[key];
        } else if (key === "description") {
          emptyObj[5] = this.deal[key].replace(/(\r\n|\n|\r)/gm, " ");
        }
      }
      for (var key in this.scenario) {
        if (key === "scenario_name") {
          emptyObj[6] = this.scenario[key];
        } else if (key === "purchase_price") {
          emptyObj[7] = this.scenario[key];
        } else if (key === "renovation_inc_mortgage") {
          emptyObj[8] =
            this.scenario["renovation_inc_mortgage"] +
            this.scenario["renovation_not_inc_mortgage"];
        } else if (key === "after_repair_value") {
          emptyObj[9] = this.scenario[key];
        } else if (key === "downpayment") {
          emptyObj[10] = this.scenario[key];
        } else if (key === "monthly_mortgage_payment_30yr") {
          emptyObj[11] = this.scenario[key];
        } else if (key === "closing_costs") {
          emptyObj[12] = this.scenario[key];
        }
      }
      rows.push(emptyObj);
      let obj = [];
      rows.push(obj);
      rows.push(obj);
      let thirtyyear = [];
      for (let index = 0; index < 31; index++) {
        if (index === 0) {
          thirtyyear.push("30 Years");
        } else {
          thirtyyear.push(`Year${index}`);
        }
      }
      rows.push(thirtyyear);
      grossRent[0] = "Gross Rent";
      vacancy[0] = "Vacancy";
      operatingIncome[0] = "Operatig Income";
      operatingExpense[0] = "Operating Expense";
      netOperatingIncome[0] = "Net Operating Income";
      loanPayment[0] = "Loan Payment";
      cashFlow[0] = "Cash Flow";
      loanToValue[0] = 'Loan to value'
      cashOnCash[0] = 'Cash On Cash'
      capRate[0] = 'Cap Rate (%)'
      this.dataArray[0].new_calculated_fields_for_30years.forEach(
        (data, index) => {
          console.log(data);
          loanToValue[index+1] = data.loan_to_value
          cashOnCash[index + 1] = data.financial_information.cash_on_cash
          capRate[index + 1] = data.financial_information.cap_rate
          operatingIncome[index + 1] =
            data.operating_profit_and_loss.monthly.operating_income !== "NaN"
              ? data.operating_profit_and_loss.monthly.operating_income
              : 0;
          operatingExpense[index + 1] =
            data.operating_profit_and_loss.monthly.operating_expenses !== "NaN"
              ? data.operating_profit_and_loss.monthly.operating_expense
              : 0;
          netOperatingIncome[index + 1] =
            data.operating_profit_and_loss.monthly.net_operating_income !== 'NaN' ? data.operating_profit_and_loss.monthly.net_operating_income : 0;
          loanPayment[index + 1] = data.mortgage_information.loan_amount !== "NaN" ? data.mortgage_information.loan_amount : 0;
          cashFlow[index + 1] = data.financial_information.cash_on_cash !== "NaN" ? data.financial_information.cash_on_cash : 0;
          vacancy[index + 1] = data.settings_used.vacancy_rate !== "NaN" ? data.settings_used.vacancy_rate : 0;
          grossRent[index + 1] =
            Number(data.settings_used.missing_data.rentals_have!== "NaN" ? data.settings_used.missing_data.rentals_have : 0) +
            Number(data.settings_used.missing_data.rentals_needed !== "NaN" ? data.settings_used.missing_data.rentals_needed : 0);
        }
      );
      rows.push(grossRent);
      rows.push(vacancy);
      rows.push(operatingIncome);
      rows.push(operatingExpense);
      rows.push(netOperatingIncome);
      rows.push(loanPayment);
      rows.push(cashFlow);
      rows.push(capRate)
      rows.push(cashOnCash)
      rows.push(loanToValue)
      // for 5 years

      rows.push(obj);
      rows.push(obj);
      let fiveyear = []
      for (let index = 0; index < 6; index++) {
        if (index === 0) {
          fiveyear.push("5 Years");
        } else {
          fiveyear.push(`Year${index}`);
        }
      }
      rows.push(fiveyear)
      fivegrossRent[0] = "Gross Rent";
      fivevacancy[0] = "Vacancy";
      fiveoperatingIncome[0] = "Operatig Income";
      fiveoperatingExpense[0] = "Operating Expense";
      fivenetOperatingIncome[0] = "Net Operating Income";
      fiveloanPayment[0] = "Loan Payment";
      fivecashFlow[0] = "Cash Flow";
      this.dataArray[0].new_calculated_fields_for_30years.forEach(
        (data, index) => {
          if(index < 5){
            fiveoperatingIncome[index + 1] =
              data.operating_profit_and_loss.monthly.operating_income !== "NaN"
                ? data.operating_profit_and_loss.monthly.operating_income
                : 0;
            fiveoperatingExpense[index + 1] =
              data.operating_profit_and_loss.monthly.operating_expenses !== "NaN"
                ? data.operating_profit_and_loss.monthly.operating_expense
                : 0;
            fivenetOperatingIncome[index + 1] =
              data.operating_profit_and_loss.monthly.net_operating_income !== "NaN" ? data.operating_profit_and_loss.monthly.net_operating_income : 0;
            fiveloanPayment[index + 1] = data.mortgage_information.loan_amount !== "NaN" ? data.mortgage_information.loan_amount  : 0;
            fivecashFlow[index + 1] = data.financial_information.cash_on_cash !== "NaN" ? data.financial_information.cash_on_cash : 0;
            fivevacancy[index + 1] = data.settings_used.vacancy_rate !== "NaN" ? data.settings_used.vacancy_rate : 0;
            fivegrossRent[index + 1] =
              Number(data.settings_used.missing_data.rentals_have !== "NaN" ? data.settings_used.missing_data.rentals_have : 0) +
              Number(data.settings_used.missing_data.rentals_needed !== "NaN" ? data.settings_used.missing_data.rentals_needed : 0);
          }
        }
      );
      rows.push(fivegrossRent);
      rows.push(fivevacancy);
      rows.push(fiveoperatingIncome);
      rows.push(fiveoperatingExpense);
      rows.push(fivenetOperatingIncome);
      rows.push(fiveloanPayment);
      rows.push(fivecashFlow);


      // 30 years calculation 
      rows.push(obj)
      rows.push(obj)
      rows.push(obj)
      let thirtyyearCalc = [
        "Year","Interest","Total Interest","Principal","Total Equity","Total Payment","% Pricipal" , "", ""
      ]
      rows.push(thirtyyearCalc)
      let arrayTocalculate = []
        let count = 1
      for (let index = 0; index < 30; index++) {
        arrayTocalculate = []
        for (let i = 0; i < 9; i++) {
          if(i === 0){
            arrayTocalculate.push(count)
            count++
          } else {
            arrayTocalculate.push(0)
          }
        }
        rows.push(arrayTocalculate)
      }
      let csvContent =
        "data:text/csv;charset=utf-8," + rows.map(e => e.join(",")).join("\n");
      this.encodedUri = encodeURI(csvContent);
    },
    editSceanrioName(){
      this.editScenario = !this.editScenario
    },
    async saveScenarioName(){
      let url = `/api/secure/updateScenario/${this.scenario.id}`
      try{
        let response = await this.axios.put(url,{
          scenario_name : this.scenario.scenario_name
        })
      } catch(error){
      }
      this.editScenario =false
      
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
        this.dataArray = response.data;
        this.dataArray[0].new_calculated_fields_for_30years.forEach(data => {
          data["loan_to_value"] = 1 - Number(data.settings_used.downpayment);
        });
        this.arrayToShow = this.dataArray[0].new_calculated_fields_for_30years;
      } catch (error) {
        console.log(error);
      }
    },
    selectDuration(duration) {
      this.arrayToShow = [];
      this.duration = duration;
      if (duration === 5) {
        this.dataArray[0].new_calculated_fields_for_30years;
        for (
          let i = 0;
          i < this.dataArray[0].new_calculated_fields_for_30years.length;
          i++
        ) {
          if (i < 5) {
            this.arrayToShow.push(
              this.dataArray[0].new_calculated_fields_for_30years[i]
            );
          }
        }
      } else if (duration === 30) {
        this.arrayToShow = this.dataArray[0].new_calculated_fields_for_30years;
      } else {
        this.getDataforOneYear();
      }
    },
    getDataforOneYear() {
      console.log("calling for 1 year");
    },
    save() {
      console.log("yes save calling");
    }
  }
};
</script>


