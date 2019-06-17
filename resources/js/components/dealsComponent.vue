<template>
  <div class="stream">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Deal Name</th>
          <th scope="col">Property Address</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(deal, index) in deals" :key="index">
          <td>{{deal.name}}</td>
          <td>{{deal.property_address}}</td>
          <td>
            <span>
              <a class="text-primary" :href="'/deal/'+deal.id">Details</a> /
              <a class="text-primary" href="#" @click="deleteDeal(deal)">Delete</a>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    deals: {
      type: Array,
      default: []
    }
  },
  methods: {
    deleteDeal(deal) {
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this deal!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.deleteByApi(deal)
          
        } else {
          swal("Your deal is safe!");
        }
      });
    },
    async deleteByApi(deal){
      let url = `/api/secure/deleteDeals/${deal.id}`;
      try {
            let response = await this.axios.delete(url);
            if (response) {
              this.$emit("deletedDeal", true);
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success"
              });
            }
          } catch (error) {
            if(error.response.data.message){
              swal(error.response.data.message)
            } else {
              swal("Your deal can not delete due to server issue!");
            }
            
          }
    }
  }
};
</script>

<style>
.stream {
  background-color: white;
  border: 2px solid #dcdcdc;
  padding: 15px;
}
</style>
