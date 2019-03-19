<template>
    <div class="container">
        <h1>30 Years Data</h1>
        <div class=" justify-content-center" style="overflow-x: auto">
          <table class="table" >
            <thead class="thead-dark">
    <tr>
      <th scope="col">Year</th>
      <th scope="col">cap_rate</th>
      <th scope="col">cash_on_cash</th>
      <th scope="col">rent_to_value</th>
      <th scope="col">debt_coverage_ratio</th>
      <th scope="col">Price</th>
      <th scope="col">Downpayment</th>
      <th scope="col">Loan_amount</th>
      <th scope="col">total_equity_needed</th>
      <th scope="col">property_value</th>
      <th scope="col">equity</th>
      <th scope="col">revenue</th>
      <th scope="col">loss_to_vacancy</th>
      <th scope="col">operating_income</th>
      <th scope="col">operating_expenses</th>
      <th scope="col">net_operating_income	</th>
      <th scope="col">mortgage_payment</th>
      <th scope="col">cash_profit</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(data, index) in yearData" :key="index">
      <th scope="row">{{index + 1}}</th>
      <td>{{data.financial_information.cap_rate}}</td>
      <td>{{data.financial_information.cash_on_cash}}</td>
      <td>{{data.financial_information.rent_to_value}}</td>
      <td>{{data.financial_information.debt_coverage_ratio}}</td>
      <td>{{data.mortgage_information.price}}</td>
      <td>{{data.mortgage_information.downpayment}}</td>
      <td>{{data.mortgage_information.loan_amount}}</td>
      <td>{{data.mortgage_information.total_equity_needed}}</td>
      <td>{{data.mortgage_information.property_value}}</td>
      <td>{{data.mortgage_information.equity}}</td>
      <td>{{data.operating_profit_and_loss.monthly.revenue}}</td>
      <td>{{data.operating_profit_and_loss.monthly.loss_to_vacancy}}</td>
      <td>{{data.operating_profit_and_loss.monthly.operating_income}}</td>
      <td>{{data.operating_profit_and_loss.monthly.operating_expenses}}</td>
      <td>{{data.operating_profit_and_loss.monthly.net_operating_income}}</td>
      <td>{{data.operating_profit_and_loss.monthly.mortgage_payment}}</td>
      <td>{{data.operating_profit_and_loss.monthly.cash_profit}}</td>
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
        clearInterval(interval)
        }
    },1000)
    }
  },
}
</script>
