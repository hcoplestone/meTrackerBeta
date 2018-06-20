<style scoped>
  div:first-of-type {
    height: 250px;
    position: relative;
  }
</style>

<script>
  import {Line} from 'vue-chartjs';
  export default {
    extends: Line,

    props: ['sleepData'],

    computed: {
      yData() {
        return _.map(this.sleepData, dataPoint => {
          switch(dataPoint.sleep) {
            case 1:
              return '0 to 3 hours';
              break;
            case 2:
              return '3 to 6 hours';
              break;
            case 3:
              return '6 to 9 hours';
              break;
            case 4:
              return '9 hours or more';
              break;
            default:
              return null;
          }
        })
      },

      xData() {
        return _.map(this.sleepData, dataPoint => {
          return new Date(dataPoint.created_at)
        });
      }
    },

    mounted() {
      this.renderChart({
        labels: this.xData,
        datasets: [
          {
            label: 'Sleep',
            data: this.yData,
            backgroundColor: 'rgba(68, 157, 229, 0.3)',
            borderColor: 'rgba(68, 157, 229, 0.7)',
            borderWidth: 2,

            pointBackgroundColor: 'rgba(68, 157, 229, 1)',
            pointBorderColor: 'rgba(68, 157, 229, 1)',
          }
        ]
      }, {
        responsive: true,
        maintainAspectRatio: false,
        tooltips: {
          // Disable the on-canvas tooltip - the tooltip is showing the wrong mood for some reason???
          enabled: false
        },

        scales: {
          yAxes: [{
            type: 'category',
            labels: ['9 hours or more', '6 to 9 hours', '3 to 6 hours', '0 to 3 hours'],
          }],

          xAxes: [{
            type: 'time',
            time: {
              unit: 'day',
              round: 'day',
              displayFormats: {
                day: 'll'
              }
            }
          }]
        }
      })
    }
  }
</script>
