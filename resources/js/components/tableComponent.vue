<template>
    <div class="container">
        <h1>30 Years Data</h1>
        <div class=" justify-content-center" style="overflow-x: auto">
          <table class="table bg-light" >
            <thead class="thead-dark">
    <tr>
      <th scope="col" class="header">Year</th>
      <th scope="col" class="header">Cap Rate</th>
      <th scope="col" class="header">Cash on Cash</th>
      <th scope="col" class="header">Rent To Value</th>
      <th scope="col" class="header">Debt Coverage Ratio</th>
      <th scope="col" class="header">Price</th>
      <th scope="col" class="header">Downpayment</th>
      <th scope="col" class="header">Loan Amount</th>
      <th scope="col" class="header">Total Equity Needed</th>
      <th scope="col" class="header">Property Value</th>
      <th scope="col" class="header">Equity</th>
      <th scope="col" class="header">Revenue</th>
      <th scope="col" class="header">Loss To Vacancy</th>
      <th scope="col" class="header">Operating Income</th>
      <th scope="col" class="header">Operating Expenses</th>
      <th scope="col" class="header">Net Operating Income	</th>
      <th scope="col" class="header">Mortgage Payment</th>
      <th scope="col" class="header">Cash Profit</th>
    </tr>
  </thead>
  <tbody> 
    <tr v-for="(data, index) in yearData" :key="index">
      <th>{{data.year}}</th>
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
</template>

<script>
export default {
  data() {
    return {
      yearData: null
    }
  },
  created() {
    this.getData()
  },
  computed: {
    },
  methods: {
    getData() {
      var interval = setInterval(() => {
        const data = JSON.parse(localStorage.getItem('30YearsData'))
      if (data){
        this.yearData = data[0]['new_calculated_fields_for_30years'];
        this.year();
        clearInterval(interval)
        }
    },1000)
    },
  year(){
    var d = new Date();
    var n = d.getFullYear();
    let yearArray = []
    for (var i = 0; i< this.yearData.length;i++){
      this.yearData[i]['year'] = n
      ++n
    }
    }
  },
}
</script>
 <style scoped>
 .header{
   white-space: nowrap;
 }
 </style>
 