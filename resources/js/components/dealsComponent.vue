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
          <td>{{deal.description}}</td>
          <td>
            <span><a class="text-primary" :href="'/deal/'+deal.id">Details</a> / <a class="text-primary" href="#">Delete</a></span>
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
    },
  },
};
</script>

<style>
.stream {
  background-color: white;
  border: 2px solid #dcdcdc;
  padding: 15px;
}
</style>
