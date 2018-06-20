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

    props: ['moodData'],

    computed: {
      yData() {
        return _.map(this.moodData, dataPoint => {
          switch(dataPoint.mood) {
            case 1:
              return 'Happy';
              break;
            case 2:
              return 'Sensitive';
              break;
            case 3:
              return 'Sad';
              break;
            case 4:
              return 'Crisis';
              break;
            default:
              return null;
          }
        })
      },

      xData() {
        return _.map(this.moodData, dataPoint => {
          return new Date(dataPoint.created_at)
        });
      }
    },

    mounted() {
      this.renderChart({
        labels: this.xData,
        datasets: [
          {
            label: 'Mood',
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
//            labels: ['Happy', 'Sensitive', 'Sad', 'Crisis']
            labels: ['Crisis', 'Sad', 'Sensitive', 'Happy'],
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
//            type: 'time',
//            time: {
//              format: 'MM/DD/YYYY HH:mm',
//              round: 'day',
//              tooltipFormat: 'll HH:mm'
//            },
//            scaleLabel: {
//              display: true,
//              labelString: 'Date'
//            }
          }]
        }
      })
    }
  }
</script>
