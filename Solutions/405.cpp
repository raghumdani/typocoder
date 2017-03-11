#include <iostream>
using namespace std;

int main() {
    long long int t,a,b,c=1;
    cin>>t;
    while(t>0)
    { cin>>a;
        
        while(a!=0)
       
       { b=a%10;
        a=a/10;
        c=b*c;
       
       }
        cout<<c<<"\n";
        t--;
        c=1;
        b=1;
    }
    
	// your code goes here
	return 0;
}