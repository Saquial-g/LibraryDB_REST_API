import unittest
import requests
import sys

unittest.TestLoader.sortTestMethodsUsing = None

class TestRESTAPI(unittest.TestCase):
    BASE_URL = 'http://127.0.0.1:8000'
    HEADERS = {'Content-Type': 'application/json', 'X-CSRF-TOKEN': ''}
    PAYLOAD =  {
        "title": "Test Title",
        "author": "Test Author",
        "publication_date": "2023-12-12",
        "genre": "Test Genre",
    }
    BOOK_ID = None

    # Test correct fetching of CSRF token
    def test_CSRF_fetching(self):
        response = requests.get(self.BASE_URL + '/api/csrf')
        self.assertEqual(response.status_code, 200)
        self.__class__.HEADERS['X-CSRF-TOKEN'] = response.json().get('csrf_token')

    # Test creation of new entries in the database
    def test_create(self):
        response = requests.post(self.BASE_URL + '/api/library', headers=self.HEADERS, json=self.PAYLOAD)
        self.assertEqual(response.status_code, 200) 
        self.__class__.BOOK_ID = response.json().get('id')

    # Test creation cases with incomplete information
    def test_invalid_create(self):
        for x in self.PAYLOAD:
            testPayload = self.PAYLOAD
            testPayload[x] = ''
            response = requests.post(self.BASE_URL + '/api/library', headers=self.HEADERS, json=testPayload)
            self.assertEqual(response.status_code, 400) 

    # Test fetching of all book data
    def test_index(self):
        response = requests.get(self.BASE_URL + '/api/library')
        self.assertEqual(response.status_code, 200) 
        self.assertGreater(len(response.json()), 0)

    # Test fetching of specific book data
    def test_book_fetching(self):
        response = requests.get(self.BASE_URL + '/api/library/' + str(self.BOOK_ID))
        self.assertEqual(response.status_code, 200) 

    # Test update of book data
    def test_book_update(self):
        updatedPayload=  {
            "title": "Updated Test Title",
            "author": "Updated Test Author",
            "publication_date": "2024-12-12",
            "genre": "Updated Test Genre",
        }
        response = requests.post(self.BASE_URL + '/api/library/' + str(self.BOOK_ID), headers=self.HEADERS, json=updatedPayload)
        self.assertEqual(response.status_code, 200) 

        # Check that the data in the database is the updated one
        response = requests.get(self.BASE_URL + '/api/library/' + str(response.json().get('id')))
        self.assertEqual(response.status_code, 200) 

        self.assertEqual(updatedPayload['title'], response.json().get('title')) 
        self.assertEqual(updatedPayload['author'], response.json().get('author')) 
        self.assertEqual(updatedPayload['publication_date'], response.json().get('publication_date')) 
        self.assertEqual(updatedPayload['genre'], response.json().get('genre')) 

    def test_invalid_book_update(self):
        updatedPayload=  {
            "title": "Updated Test Title",
            "author": "Updated Test Author",
            "publication_date": "2024-12-12",
            "genre": "Updated Test Genre",
        }
        for x in updatedPayload:
            testPayload = updatedPayload
            testPayload[x] = ''
            response = requests.post(self.BASE_URL + '/api/library/' + str(self.BOOK_ID), headers=self.HEADERS, json=testPayload)
            self.assertEqual(response.status_code, 400) 

    def test_delete(self):
        response = requests.delete(self.BASE_URL + '/api/library/' + str(self.BOOK_ID), headers=self.HEADERS)
        self.assertEqual(response.status_code, 200) 
        self.assertEqual(response.json().get('message'), 'Book deleted successfully')

if __name__ == '__main__':
    suite = unittest.TestSuite()

    # Define order of test execution
    suite.addTest(TestRESTAPI('test_CSRF_fetching'))
    suite.addTest(TestRESTAPI('test_create'))
    suite.addTest(TestRESTAPI('test_invalid_create'))
    suite.addTest(TestRESTAPI('test_index'))
    suite.addTest(TestRESTAPI('test_book_fetching'))
    suite.addTest(TestRESTAPI('test_book_update'))
    suite.addTest(TestRESTAPI('test_invalid_book_update'))
    suite.addTest(TestRESTAPI('test_delete'))

    runner = unittest.TextTestRunner(verbosity=2)
    runner.run(suite)
        
