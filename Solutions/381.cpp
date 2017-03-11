#include <iostream>
using namespace std;

long long n,temp;

int main() {
    
    int t;
    cin >> t;
    while(t--){
        cin >> n;
        temp=n;
        int res=1;
        int dig;
        while(temp){
            dig=temp%10;
            res*=dig;
            temp/=10;
        }
        if(n==0)
        cout << 0 << endl;
        else
        cout << res << endl;
        
    }
    
    
	return 0;
}