using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.Entity;

namespace RegistrationForm.Models
{
    public class UserContext:DbContext
    {
        public UserContext()
         :base("Mycon")
        {
                 DropCreateDatabaseIfModelChanges<UserContext> h=new DropCreateDatabaseIfModelChanges<UserContext>();
                 Database.SetInitializer<UserContext>(h);
         }
        public DbSet<DemoRegister> users { get; set;}
    }
}