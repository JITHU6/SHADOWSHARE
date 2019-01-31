using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using RegistrationForm.Models;

namespace RegistrationForm.Controllers
{
    public class RegisterController : Controller
    {
        private UserContext db = new UserContext();

        //
        // GET: /Register/

        public ActionResult Index()
        {
            return View(db.users.ToList());
        }

        //
        // GET: /Register/Details/5

        public ActionResult Details(int id = 0)
        {
            DemoRegister demoregister = db.users.Find(id);
            if (demoregister == null)
            {
                return HttpNotFound();
            }
            return View(demoregister);
        }

        //
        // GET: /Register/Create

        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /Register/Create

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(DemoRegister demoregister)
        {
            if (ModelState.IsValid)
            {
                db.users.Add(demoregister);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(demoregister);
        }

        //
        // GET: /Register/Edit/5

        public ActionResult Edit(int id = 0)
        {
            DemoRegister demoregister = db.users.Find(id);
            if (demoregister == null)
            {
                return HttpNotFound();
            }
            return View(demoregister);
        }

        //
        // POST: /Register/Edit/5

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(DemoRegister demoregister)
        {
            if (ModelState.IsValid)
            {
                db.Entry(demoregister).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(demoregister);
        }

        //
        // GET: /Register/Delete/5

        public ActionResult Delete(int id = 0)
        {
            DemoRegister demoregister = db.users.Find(id);
            if (demoregister == null)
            {
                return HttpNotFound();
            }
            return View(demoregister);
        }

        //
        // POST: /Register/Delete/5

        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            DemoRegister demoregister = db.users.Find(id);
            db.users.Remove(demoregister);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}