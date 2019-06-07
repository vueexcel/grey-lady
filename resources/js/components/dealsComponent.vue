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
        <tr>
          <td>deal.name</td>
          <td>property</td>
          <td>
            <a class="text-primary" href="#">Details</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {};
</script>

<style>
.stream {
  background-color: white;
  border: 2px solid #dcdcdc;
  padding: 15px;
}
</style>
