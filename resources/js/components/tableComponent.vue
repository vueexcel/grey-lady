<template>
  <div class="box box-default">
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
              <th class="header">Net Operating Income	</th>
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
  </div>
</template>

<style>
.header {
  padding: 6px 8px;
}
</style>


<script>

export default {
  data() {
    return {
      yearData: null
    }
  },
  created() {
    window.addEventListener('data',(data) => {
      this.yearData = data.detail[0]['new_calculated_fields_for_30years']
      this.year()
    })
  },
  computed: {
    },
    methods: {
      year(){
        var d = new Date();
        var n = d.getFullYear();
        let yearArray = []
        for (var i = 0; i< this.yearData.length;i++){
          this.yearData[i]['year'] = n
          ++n
        }
      }
    }
  }
</script>
