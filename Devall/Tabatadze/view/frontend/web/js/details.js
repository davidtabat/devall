define([
    'uiComponent',
    'ko',
    'jquery'
], function(Component, ko, $) {
        return Component.extend({
        initialize: function(config) {
            var feature = this;
            this._super();
            this.country(config.countrycompany);
            this.street(config.streetcompany);
            this.streetNum(config.numstreet);
            this.companySize(config.sizecompany);
            $('select').on('change', function () {
                var valueSelected = this.value - 1;
                ourAsyncFunction(valueSelected);
            });
            async function ourAsyncFunction(id){
                $.ajax({url: "/rest/V1/devall_company/", success: function(result){
                        setCompanyDetails(result[id]);
                    }});
            }
            function setCompanyDetails(details){
                feature.country(details.country);
                feature.street(details.street);
                feature.streetNum(details.street_number);
                feature.companySize(details.size);

            }
        },
        country: ko.observable(""),
        street: ko.observable(""),
        streetNum: ko.observable(""),
        companySize: ko.observable(""),

        getCountry: function () {
            return this.country;
        },
        getStreet: function () {
            return this.street;
        },
        getNum: function () {
            return this.streetNum;
        },
        getCompanySize: function () {
            return this.companySize;
        }
    });
});
