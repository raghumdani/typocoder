#include <iostream> 
using namespace std;

int main() { 
    int t;
    cin>>t;
    for(int i=0;i<t;i++)
    {
        int k;
        long long int n,no=0,now=1,c;
        cin>>n>>k;
        c=n;
        while(c>0)
        {
            no++;
            c/=2;
        }
        for(int j=no-k+1;j<=no;j++)
            now*=j;
        if(no<k)
            now=0;
        cout<<now<<endl;
    }
    return 0;
}