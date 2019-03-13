/**
 * Javascript Week 07 - Demo 04
 *
 * Filename: js/demo-04.js
 * Author:   Adrian Gould
 * Date:     2019-03-12
 *
 */
let _locale='en_GB';

var _month_names = {},
    _day_names = {},
    _num_days_in_months = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

_month_names.en_GB = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
_day_names.en_GB = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

let doc=document;
let calSpot = doc.getElementById('calendar');
let calendar = draw_monthly_calendar(11, 2019);
calSpot.innerHTML=calendar;

function draw_monthly_calendar(month_num, year)
{
    var arr_month_num = parseInt(month_num) - 1;
    year = parseInt(year);

    var date_obj = new Date(month_num + ' 1,' + year);

    var days_in_feb = ( (year % 100 !== 0) && (year % 4 === 0) || (year % 400 === 0) ) ? 29 : 28,
        num_days_in_set_month = (arr_month_num === 1) ? days_in_feb : _num_days_in_months[arr_month_num];

    var first_day_in_month = date_obj.getDay(),
        calendar_content = '';

    var tmp = first_day_in_month;
    while(tmp > 0)
    {
        calendar_content += '<td class="prev-month-day"></td>';
        tmp--;
    }

    tmp = first_day_in_month;
    var i = 1;
    while(i <= num_days_in_set_month)
    {
        if (tmp > 6)
        {
            tmp = 0;
            calendar_content += '</tr><tr class="week">';
        }

        var ymd_str = year + '-' + lpad(month_num, 0, 2) + '-' + lpad(i, 0, 2);
        calendar_content += '<td class="day" data-date="' + ymd_str + '">' + i + '</td>';
        tmp++;
        i++;
    }

    var ym_str = year + '-' + lpad(month_num, 0, 2);
    var calendar = '<table class="table" data-date="' + ym_str + '"><tr class="month-label-ctn"><th class="month-label" colspan="7">' + _month_names[_locale][arr_month_num] + ' ' + year + '</th></tr>';
    calendar+= '<tr class="day-label-ctn">';
    $.each(_day_names[_locale], function(i, name)
    {
        calendar+= '<td class="day-label">' + name + '</td>';
    });
    calendar+= '<tr class="week">' + calendar_content + '</tr></table>';

    return calendar;
}

function lpad(num, pad, length) {
    while(num.length<length){
        num=pad.toString()+num;
    }
    return num;
}