var app = new Vue({
    el: "#app",
    data: () => {
      return {
        steps: {},
        step: 1,
        customer: {
          gender: "1",
          firstName: "",
          lastName: "",
          phoneNumber: "",
          address: "",
          zipCode: "",
          city: "",
          birthDay: "",
          termOfService: "",
          pinCode: "",
          eMail: "",
          postcode: "",
        },
        submittedForm : false,
        hasSeenCongrats: false,
        tempCustomer: {
          gender: "",
          firstName: "",
          lastName: "",
          phoneNumber: "",
          address: "",
          zipCode: "",
          city: "",
          birthDay: "",
          termOfService: "",
          pinCode: "",
          eMail: "",
        },
        post_code: "",
        broadband_name: "",
      };
    },
    methods: {
      prev() {
        this.step--;
      },
  
      next() {
        this.step++;
      },
  
      customerRegister: function () {
        this.hasSeenCongrats = true;
        this.submittedForm = true;
      }
    }
  });