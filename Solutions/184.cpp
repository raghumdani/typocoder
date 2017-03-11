#include <bits/stdc++.h>
using namespace std;

int main() {
    int t;
    scanf("%d",&t);
    while(t--)
    {
        long long n;
        scanf("%lld",&n);
        int flag=true;
        if(n==1)
            flag=false;
        else
        {
        for(int i=2;i<=sqrt(n);i++)
        {
            if(n%i==0)
            {
                //cout<<i<<" "<<n<<" "<<n%i<<endl;;
                flag=false;
                break;
            }
        }
        }
        if(flag)
        printf("YES\n");
        else
        printf("NO\n");
    }
	// your code goes here
	return 0;
}
