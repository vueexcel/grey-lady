<template>
  <div class="stream">
    <v-data-table :headers="headers" :items="dealsArray" class="elevation-1">
      <template v-slot:items="props">
        <td>{{ props.item.name }}</td>
        <td class>{{ props.item.property_address }}</td>
        <td class>
          <span>
            <a class="text-primary" :href="'/deal/'+props.item.id">Details</a> /
            <a class="text-primary" href="#" @click="deleteDeal(props.item)">Delete</a>
          </span>
        </td>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import Vue from "vue";
export default {
  data() {
    return {
      headers: [
        {
          text: "Deal Name",
          align: "left",
          sortable: true,
          class: "head",
          value: "name"
        },
        { text: "Property Address", class: "head", value: "property_address" },
        { text: "Action", class: "head", value: "" }
      ],
      dealsArray:[]
    };
  },
  props: {
    deals: {
      type: Array,
      default: []
    }
  },
  created () {
    this.callMethod();
  },
  methods: {
    callMethod(){
      this.dealsArray = this.deals
    },
    deleteDeal(deal) {
      this.$swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this deal!",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          this.deleteByApi(deal);
        } else {
          swal("Your deal is safe!");
        }
      });
    },
    async deleteByApi(deal) {
      let url = `/api/secure/deleteDeals/${deal.id}`;
      try {
        let response = await this.axios.delete(url);
        if (response) {
          this.$emit("deletedDeal", true);
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success"
          });
          this.dealsArray.forEach((dealtoSplice, index) => {
            if (deal.id === dealtoSplice.id) {
              this.dealsArray.splice(index, 1);
              this.$forceUpdate();
            }
          });    
        }
      } catch (error) {
        if (error.response.data.message) {
          swal(error.response.data.message);
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

.head {
  font-size: 14px !important;
  font-weight: bold !important;
}
</style>
