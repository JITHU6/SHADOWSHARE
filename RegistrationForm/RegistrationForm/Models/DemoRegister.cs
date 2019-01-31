using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;

namespace RegistrationForm.Models
{
    public class DemoRegister
    {
        public int DemoRegisterId { get; set; }

        [Display(Name = "Name")]
        [DataType(DataType.Text,ErrorMessage = "enter valid text")]
        [Range(10,20)]
        public string name { get; set; }

        [Display(Name = "Mobile Number")]
        [DataType(DataType.PhoneNumber, ErrorMessage = "enter valid number")]
        public string mobilenumber { get; set; }


        [Display(Name = "Address")]
        [DataType(DataType.MultilineText, ErrorMessage = "enter Address")]
        public string Address { get; set; }


        [Display(Name = "Gender")]
        [DataType(DataType.Text, ErrorMessage = "Enter gender")]
        public string Gender { get; set; }


        [Display(Name = "Email")]
        [DataType(DataType.EmailAddress, ErrorMessage = "enter valid text")]
        public string  Email { get; set; }


        [Display(Name = "Course")]
        [DataType(DataType.Text, ErrorMessage = "enter valid text")]
        public string Course { get; set; }

    }
}